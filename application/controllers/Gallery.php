<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/dashboard/index';
        $this->load->model('gallery_model');
    }

    public function index()
    {
        $this->init();
    }

    public function photos()
    {
        if (!$photos = $this->gallery_model->get_all(array('type_id' => '1'))) {
            $photos = 'Tidak Ditemukan Foto';
        }
        $this->_data['photos'] = $photos;
        $this->_view['title'] = 'Galeri Foto';
        $this->_view['page'] = 'gallery/photos';
        $this->init();
    }

    public function videos()
    {
        if (!$videos = $this->gallery_model->get_all(array('type_id' => '2'))) {
            $videos = 'Tidak Ditemukan Video';
        }
        $this->_data['videos'] = $videos;
        $this->_view['title'] = 'Galeri Video';
        $this->_view['page'] = 'gallery/videos';
        $this->init();
    }

    public function create($type = 1)
    {
        $this->_data['type'] = $type;
        $this->_view['title'] = 'Upload File';
        $this->_view['page'] = 'gallery/create';
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post();
        $upload = FALSE;

        if (isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])) {
            $data['link'] = $this->do_upload($data['type_id']);
            $upload = TRUE;
        }

        if ($data['link'] != FALSE) {
            unset($data['links'], $data['files']);
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
        $type = ($data['type_id'] == 1) ? 'photos' : 'videos';
        $this->go('gallery/' . $type);
    }

    public function do_upload($type_id)
    {
        $type = ($type_id == 1) ? 'photos' : 'videos';
        $config['file_name'] = $type . '-' . date('dmYHis');
        $config['upload_path'] = './assets/' . $type . '/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|mpg|3gp|flv';
        $config['max_size'] = 50000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
            $this->message($this->upload->display_errors(), 'danger');
            $this->go('gallery/create/' . $type_id);
        }
        $data = $this->upload->data();
        return base_url('assets/' . $type . '/' . $data['file_name']);
    }

    public function show()
    {
        $id = $this->input->get('id');
        $data = $this->gallery_model->get(array('id' => $id));
        echo json_encode($data);
    }

    public function edit($id = NULL)
    {

    }

    public function update($id = NULL)
    {

    }

    public function destroy($type = 'photo', $id = NULL)
    {
        $redirect = ($type == 'photo') ? 'photos' : 'videos';
        $type = ($type == 'photo') ? 'Foto' : 'Video';
        if ($this->gallery_model->delete($id)) {
            $this->message('<strong>Berhasil</strong> menghapus ' . $type, 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus ' . $type, 'danger');
        }
        redirect('gallery/' . $redirect);
    }
}
