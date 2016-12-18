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
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        $this->_view['title'] = 'Tambah Foto';
        $this->_view['page'] = 'gallery/photos/add';
        $this->_data['category_id'] = $id;
        $this->init();
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
        } else {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
    }

    public function show($id = NULL)
    {
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
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
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
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
        if ($update_id == NULL || $update_id == 0 || empty($update_data)) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        unset($update_data['id']);
        if ($update_id == NULL || $update_id == 0 || empty($update_data)) {
            $this->message('<strong>Gagal</strong> Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
        if ($this->category_model->update($update_data, $update_id)) {
            $this->message('<strong>Berhasil</strong> mengedit Galeri', 'success');
        } else {
            $this->message('<strong>Gagal</strong> mengedit Galeri', 'danger');
        }
        $this->go('photos');
    }

    public function destroy($id = NULL)
    {
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
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
        $id = $this->input->get('id');
        $category = $this->input->get('category_id');
        $data = $this->gallery_model->get(array('id' => $id, 'category_id' => $category));
        echo json_encode($data);
    }

    public function remove_image()
    {
        $file = $this->input->get('link');
        $file_path = str_replace(base_url(), '', $file);
        $status = FALSE;
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                if ($this->gallery_model->delete(array('link' => $file)))
                    $status = TRUE;
            }
        }
        echo $status;
    }

    public function remove_multiple()
    {

        $status = FALSE;
        $category_id = $this->input->post('category_id');
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
            $this->go('photos/show/' . $category_id);
        }
        if ($status) {
            $this->message('<strong>Berhasil</strong> menghapus Foto', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Foto', 'danger');
        }
        $this->go('photos/show/' . $category_id);
    }
}
