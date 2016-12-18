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
        $this->_view['js'] = 'gallery';
        $this->load->model(array('gallery_model', 'category_model'));
    }

    public function index()
    {
        if (!$galleries = $this->category_model->get_all()) {
            $galleries = 'Tidak Ditemukan Galeri Foto';
        }
        $this->_data['galleries'] = $galleries;
        $this->_view['title'] = 'Galeri Foto';
        $this->_view['page'] = 'gallery/photos/index';
        $this->init();
    }

    public function create()
    {
        $this->_data['action'] = 'store';
        $this->_view['title'] = 'Tambah Galeri Foto';
        $this->_view['page'] = 'gallery/photos/create';
        $this->init();
    }

    public function add($id = NULL)
    {
        $this->_view['title'] = 'Tambah Foto';
        $this->_view['page'] = 'gallery/photos/add';
        $this->_data['category_id'] = $id;
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post();
        if ($this->category_model->insert($data)) {
            $this->message('Berhasil! membuat Galeri Foto', 'success');
        } else {
            $this->message('Gagal! membuat Galeri Foto', 'danger');
        }
        $this->go('photos');
    }

    public function do_upload($category_id)
    {
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
        }
    }

    public function show($id = NULL)
    {
        $data = $this->category_model->get(array('id' => $id));
        $galleries = $this->category_model->get(array('id' => $id));
        $this->_data['galleries'] = $galleries;
        $this->_data['photos'] = $this->gallery_model->get_all(array('category_id' => $galleries->id));
        $this->_view['title'] = 'Isi Galeri';
        $this->_view['page'] = 'gallery/photos/detail';
        $this->init();
    }

    public function edit($id = NULL)
    {
        $this->_data['action'] = 'update';
        $this->_data['data'] = $this->category_model->get(array('id' => $id));
        $this->_view['title'] = 'Edit Foto';
        $this->_view['page'] = 'gallery/photos/create';
        $this->init();
    }

    public function update()
    {
        $update_data = $this->input->post();
        $update_id = $update_data['id'];
        unset($update_data['id']);
        if ($this->category_model->update($update_data, $update_id)) {
            $this->message('<strong>Berhasil</strong> mengedit Galeri', 'success');
        } else {
            $this->message('<strong>Gagal</strong> mengedit Galeri', 'danger');
        }
        $this->go('photos');
    }

    public function destroy($id = NULL)
    {
        $this->load->helper("file");
        $status = FALSE;
        $photos = $this->gallery_model->get_all(array('category_id' => $id));
        foreach ($photos as $photo) {
            $file = str_replace(base_url(), '', $photo->link);
            if (file_exists($file)) {
                if (unlink($file))
                    $status = TRUE;
            }
        }
        if ($status && $this->category_model->delete($id)) {
            $this->message('<strong>Berhasil</strong> menghapus Galeri Foto', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Galeri Foto', 'danger');
        }
        $this->go('photos');
    }

    public function show_image($id)
    {
        $id = $this->input->get('id');
        $data = $this->gallery_model->get(array('id' => $id));
        echo json_encode($data);
    }
}
