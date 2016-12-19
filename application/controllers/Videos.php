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


    public function index()
    {
        if (!$videos = $this->gallery_model->get_all(array('type_id' => '2'))) {
            $videos = 'Tidak Ditemukan Video';
        }
        $this->_data['videos'] = $videos;
        $this->_view['title'] = 'Galeri Video';
        $this->_view['page'] = 'gallery/videos/index';
        $this->init();
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

    public function show()
    {
        $id = $this->input->get('id', TRUE);
        $this->is_not_empty($id);
        $data = $this->gallery_model->get(array('id' => $id));
        echo json_encode($data);
    }

    public function edit()
    {
        $id = $this->input->get('id', TRUE);
        $this->is_not_empty($id);
        $this->_data['action'] = 'update';
        $this->_data['data']  = $this->gallery_model->get(array('id' => $id));
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
        $this->go('gallery/videos');
    }

    public function destroy()
    {
        $id = $this->input->get('id', TRUE);
        $this->is_not_empty($id);
        if ($this->gallery_model->delete($id)) {
            $this->message('<strong>Berhasil</strong> menghapus Foto', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Foto', 'danger');
        }
        $this->go('gallery/videos');
    }

    /**
     * @param $id
     */
    private function is_not_empty($id)
    {
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('videos');
        }
    }
}
