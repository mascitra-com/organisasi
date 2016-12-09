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
        $this->_data['photos'] = $this->gallery_model->get_all(array('type_id' => '1'));
        $this->_view['title'] = 'Galeri Foto';
        $this->_view['page'] = 'gallery/photos';
        $this->init();
    }

    public function videos()
    {
        $this->_data['videos'] = $this->gallery_model->get_all(array('type_id' => '2'));
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
        $this->go('gallery/create/' . $data['type_id']);
    }

    public function do_upload($type_id)
    {
        $type = ($type_id == 1) ? 'photos' : 'videos';
        $config['file_name'] = $type . '-' . date('dmYHis');
        $config['upload_path'] = './assets/img/' . $type . '/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|mpg|3gp|flv';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
            $this->message($this->upload->display_errors(), 'danger');
            $this->go('gallery/create/' . $type_id);
        }
        $data = $this->upload->data();
        return $data['full_path'];
    }

    public function show($id = NULL)
    {

    }

    public function edit($id = NULL)
    {

    }

    public function update($id = NULL)
    {

    }

    public function destroy($id = NULL)
    {

    }
}
