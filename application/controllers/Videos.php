<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/dashboard/index';
        $this->_view['js'] = 'gallery';
        $this->load->model(array('gallery_model', 'category_model'));
    }


    public function index($search_status = FALSE) {
        if($search_status == FALSE){
            $this->session->unset_userdata('search_video');
        }
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 4;
        $this->_data['per_page_name'] = 'Video';
        $this->_data['per_page_options'] = array(4, 8, 12, 16, 20);
        $this->page();
        $this->_data['i'] = 2;
        $this->_data['j'] = 3;
        $this->_data['k'] = count($this->_data['videos']);
        $this->_view['title'] = 'Galeri Video';
        $this->_view['page'] = 'gallery/videos/index';
        $this->init();
    }

    public function search()
    {
        $this->session->unset_userdata('search_video');
        $this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
        $this->session->set_userdata('search_video', $this->_data['search']);
        $this->index(TRUE);
    }

    public function refresh()
    {
        $this->session->unset_userdata('search_video');
        $this->go('videos');
    }

    private function page()
    {
        $this->_data['search'] = $this->session->userdata('search_video');
        $config['base_url'] = site_url('videos/index?per_page=' . $this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->gallery_model->count_videos($this->_data['search']);
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        $this->_data['videos'] = $this->gallery_model->fetch_videos($config["per_page"], $this->data['page'], $this->_data['search']);
        $this->_data['pagination'] = $this->pagination->create_links();
    }

    public function create()
    {
        $this->_data['action'] = 'store';
        $this->_view['page'] = 'gallery/videos/create';
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post(NULL, TRUE);
        $this->is_not_empty($data);
        $upload = FALSE;
        if (isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])) {
            $data['link'] = $this->do_upload();
            $upload = TRUE;
        }

        if (!empty($data['link'])) {
            unset($data['links'], $data['files']);
            if (strpos($data['link'], 'youtube')) {
                $data['link'] = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $data['link']);
            }
            $data['type_id'] = 2;
            if ($this->gallery_model->insert($data)) {
                $this->message('Berhasil! menyimpan video', 'success');
                $this->go('videos');
            } else {
                if ($upload) {
                    $file_path = str_replace(base_url(), '', $data['link']);
                    unlink($file_path);
                }
                $this->message('Gagal! menyimpan video', 'danger');
                $this->_data['action'] = 'store';
                $this->_data['data'] = (object) $data;
                $this->_view['page'] = 'gallery/videos/create';
                $this->init();
            }
        } else {
            $this->message('Gagal! Video belum di pilih atau link sedang kosong', 'danger');
            $this->_data['action'] = 'store';
            $this->_data['data'] = (object) $data;
            $this->_view['page'] = 'gallery/videos/create';
            $this->init();
        }
    }

    private function do_upload()
    {
        $config['file_name'] = 'video-' . date('dmYHis');
        $config['upload_path'] = './assets/videos/';
        $config['allowed_types'] = 'flv|mpg|mp4|3gp';
        $config['max_size'] = 50000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
            $this->message($this->upload->display_errors(), 'danger');
            $this->go('videos/create');
        }
        $data = $this->upload->data();
        return base_url('assets/videos/' . $data['file_name']);
    }

    public function show($name = NULL)
    {
        $name = str_replace('-', ' ', $name);
        $data = $this->gallery_model->get(array('name' => $name));
        echo json_encode($data);
    }

    public function edit($name)
    {
        $name = str_replace('-', ' ', $name);
        $this->_data['action'] = 'update';
        $this->_data['data']  = $this->gallery_model->get(array('name' => $name));
        $this->_view['title'] = 'Edit Video';
        $this->_view['page'] = 'gallery/videos/create';
        $this->init();
    }

    public function update()
    {
        $update_data = $this->input->post(NULL, TRUE);
        $update_id = $update_data['id'];
        if ($update_id == NULL || $update_id == 0 || empty($update_data)) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        unset($update_data['id']);
        if ($this->gallery_model->update($update_data, $update_id)) {
            $this->message('<strong>Berhasil</strong> mengedit Galeri', 'success');
        } else {
            $this->message('<strong>Gagal</strong> mengedit Galeri', 'danger');
        }
        $this->go('videos');
    }

    public function destroy($name)
    {
        $name = str_replace('-', ' ', $name);
        $this->is_worked($this->gallery_model->delete(array('name' => $name)), 'menghapus', 'Video');
        $this->go('videos');
    }

    /**
     * @param $config
     *
     * @return mixed
     */
    private function config_for_bootstrap_pagination($config)
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = $this->lang->line('pagination_first_link');
        $config['last_link'] = $this->lang->line('pagination_last_link');
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev_link');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next_link');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }
}
