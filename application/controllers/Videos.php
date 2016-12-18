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
        $data = $this->input->post();
        if(empty($data)){
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('videos');
        }
        $upload = FALSE;
        if (isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])) {
            $data['link'] = $this->do_upload();
            $upload = TRUE;
        }

        if ($data['link'] != FALSE) {
            unset($data['links'], $data['files']);
            $data['type_id'] = 2;
            if ($this->gallery_model->insert($data)) {
                $this->message('Berhasil! menyimpan foto', 'success');
            } else {
                if ($upload) {
                    unlink($data['link']);
                }
                $this->message('Gagal! menyimpan foto', 'danger');
            }
        } else {
            $this->message('Gagal! menyimpan foto', 'danger');
        }
        $this->go('gallery/photos');
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
            $this->go('gallery/create/videos');
        }
        $data = $this->upload->data();
        return base_url('assets/videos/' . $data['file_name']);
    }

    public function show()
    {
        $id = $this->input->get('id');
        $data = $this->gallery_model->get(array('id' => $id));
        echo json_encode($data);
    }

    public function edit($id = NULL)
    {
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        $this->_data['title'] = $type_name;
        $this->_data['data']  = $this->gallery_model->get(array('id' => $id));
        $this->_view['title'] = $type_name;
        $this->_view['page'] = 'gallery/videos/create';
        $this->init();
    }

    public function update()
    {
        $update_data = $this->input->post();
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

    public function destroy($id = NULL)
    {
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        if ($this->gallery_model->delete($id)) {
            $this->message('<strong>Berhasil</strong> menghapus Foto', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Foto', 'danger');
        }
        $this->go('gallery/videos');
    }
}
