<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/dashboard/index';
        $this->_view['css'] = 'gallery';
        $this->_view['js'] = 'gallery';
        $this->load->model(array('gallery_model', 'category_model'));
    }

    public function index()
    {
        $this->input_get_for_pagination(10);
        $this->page();
        $this->_view['title'] = 'Galeri Foto';
        $this->_view['page'] = 'gallery/photos/index';
        $this->init();
    }

    private function page()
    {
        $config['base_url'] = site_url('photos/index?per_page='.$this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->category_model->count_rows();
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        $this->_data['galleries'] = $this->category_model->fetch_data($config["per_page"], $this->data['page']);
        $this->_data['pagination'] = $this->pagination->create_links();
    }

    public function create()
    {
        $this->_data['action'] = 'store';
        $this->_view['title'] = 'Tambah Galeri Foto';
        $this->_view['page'] = 'gallery/photos/create';
        $this->init();
    }

    public function add()
    {
        $id = $this->input->get('id', TRUE);
        $this->is_not_empty($id);
        $this->_view['title'] = 'Tambah Foto';
        $this->_view['page'] = 'gallery/photos/add';
        $this->_data['category_id'] = $id;
        $this->init();
    }

    /**
     * @param $id
     */
    private function is_not_empty($id)
    {
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
    }

    public function store()
    {
        $data = $this->input->post();
        if (empty($data)) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        if ($this->category_model->insert($data)) {
            $this->message('Berhasil! membuat Galeri Foto', 'success');
        } else {
            $this->message('Gagal! membuat Galeri Foto', 'danger');
        }
        $this->go('photos');
    }

    public function do_upload()
    {
        $category_id = $this->input->get('category_id', TRUE);
        if ($category_id == NULL || $category_id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        if (!empty($_FILES)) {
            $config['file_name'] = $_FILES['file']['name'];
            $config['upload_path'] = './assets/photos/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->message($this->upload->display_errors(), 'danger');
            }
            $file_date = $this->upload->data();
            $link = base_url('assets/photos/' . $file_date['file_name']);
            $data = [
                'link' => $link,
                'category_id' => $category_id,
                'type_id' => 1
            ];
            $this->gallery_model->insert($data);
        } else {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
    }

    public function show()
    {
        $this->input_get_for_pagination(8);
        $this->_data['id'] = $this->input->get('id', TRUE);
        $this->is_not_empty($this->_data['id']);
        $this->_data['galleries'] = $this->category_model->get(array('id' => $this->_data['id']));
        $this->pages();
        $this->_data['i'] = 4;
        $this->_data['j'] = 7;
        $this->_data['k'] = count($this->_data['photos']);
        $this->_view['title'] = 'Isi Galeri';
        $this->_view['page'] = 'gallery/photos/detail';
        $this->init();
    }

    private function pages()
    {
        //pagination settings
        $config['base_url'] = site_url('photos/show?id='.$this->_data['id'].'&per_page='.$this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->gallery_model->count_rows(array('category_id' => $this->_data['id']));
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        $this->_data['photos'] = $this->gallery_model->fetch_data($config["per_page"], $this->data['page'], $this->_data['id']);
        $this->_data['pagination'] = $this->pagination->create_links();
    }

    public function edit()
    {
        $id = $this->input->get('id', TRUE);
        $this->is_not_empty($id);
        $this->_data['action'] = 'update';
        $this->_data['data'] = $this->category_model->get(array('id' => $id));
        $this->_view['title'] = 'Edit Foto';
        $this->_view['page'] = 'gallery/photos/create';
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
        if ($this->category_model->update($update_data, $update_id)) {
            $this->message('<strong>Berhasil</strong> mengedit Galeri', 'success');
        } else {
            $this->message('<strong>Gagal</strong> mengedit Galeri', 'danger');
        }
        $this->go('photos');
    }

    public function destroy()
    {
        $id = $this->input->get('id', TRUE);
        $this->is_not_empty($id);
        $this->load->helper("file");
        $status = FALSE;
        $photos = $this->gallery_model->get_all(array('category_id' => $id));
        if (empty($photos)) {
            $status = TRUE;
        }
        foreach ($photos as $photo) {
            $file = str_replace(base_url(), '', $photo->link);
            if (file_exists($file)) {
                if (unlink($file)) {
                    if ($this->gallery_model->delete($photo->id))
                        $status = TRUE;
                }
            }
        }
        if ($status && $this->category_model->delete($id)) {
            $this->message('<strong>Berhasil</strong> menghapus Galeri Foto', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Galeri Foto', 'danger');
        }
        $this->go('photos');
    }

    public function show_image()
    {
        $id = $this->input->get('id', TRUE);
        $category = $this->input->get('category_id', TRUE);
        if ($id == NULL || $id == 0 || $category == NULL || $category == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        $data = $this->gallery_model->get(array('id' => $id, 'category_id' => $category));
        echo json_encode($data);
    }

    public function remove_image()
    {
        $file = $this->input->get('link', TRUE);
        $this->is_not_empty($file);
        $file_path = str_replace(base_url(), '', $file);
        $status = FALSE;
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                if ($this->gallery_model->delete(array('link' => $file)))
                    $status = TRUE;
            }
        }
        $this->is_true($status);
        echo $status;
    }

    /**
     * @param $status
     */
    private function is_true($status)
    {
        if ($status) {
            $this->message('<strong>Berhasil</strong> menghapus Foto', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Foto', 'danger');
        }
    }

    public function remove_multiple()
    {
        $status = FALSE;
        $category_id = $this->input->post('category_id', TRUE);
        $this->is_not_empty($category_id);
        if (!empty($_POST['check_list'])) {
            foreach ($_POST['check_list'] as $id) {
                $photo = $this->gallery_model->get($id);
                $file = $photo->link;
                $file_path = str_replace(base_url(), '', $file);
                if (file_exists($file_path)) {
                    if (unlink($file_path)) {
                        if ($this->gallery_model->delete($id))
                            $status = TRUE;
                    }
                }
            }
        } else {
            $this->message('Anda tidak memilih foto apapun', 'danger');
            $this->go('photos/show?id=' . $category_id);
        }
        $this->is_true($status);
        $this->go('photos/show?id=' . $category_id);
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

    private function input_get_for_pagination($default_per_page)
    {
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : $default_per_page;
    }
}
