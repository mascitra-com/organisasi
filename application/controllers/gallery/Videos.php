<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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

    public function create($type = 1)
    {
        $this->_data['type'] = $type;
        $type_name = ($type == 1) ? 'Tambah Foto' : 'Tambah Video';
        $this->_data['title'] = $type_name;
        $this->_view['title'] = $type_name;
        $this->_view['page'] = 'gallery/videos/create';
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
        $this->go('gallery/photos');
    }

    public function do_upload($type_id)
    {
        $config['file_name'] = $type . '-' . date('dmYHis');
        $config['upload_path'] = './assets/photos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 50000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('files')) {
            $this->message($this->upload->display_errors(), 'danger');
            $this->go('gallery/create/photos');
        }
        $data = $this->upload->data();
        return base_url('assets/photos/' . $data['file_name']);
    }

    public function show()
    {
        $id = $this->input->get('id');
        $data = $this->gallery_model->get(array('id' => $id));
        echo json_encode($data);
    }

    public function edit($id = NULL)
    {
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
        if ($this->gallery_model->delete($id)) {
            $this->message('<strong>Berhasil</strong> menghapus Foto', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Foto', 'danger');
        }
        $this->go('gallery/videos');
    }
}
