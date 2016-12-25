<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulation extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        # Set data
        $this->_view['template'] = 'template/dashboard/index';
        // $this->_view['css'] 	 = 'dashboard';
        // $this->_view['js'] 		 = '';
        $this->load->model('regulation_model');
    }

    public function create()
    {
        $this->_view['title'] = 'Tambah Regulasi';
        $this->_view['page'] = 'regulation/create';
        $this->_data['action'] = 'store';
        $this->init();
    }

    /**
     *  Tampilan daftar Regulasi
     */
    public function index()
    {
        $this->_view['title'] = 'Regulasi';
        $this->_view['page'] = 'regulation/index';
        $this->_data['regulations'] = $this->regulation_model->get_all();
        $this->init();
    }

    /**
     *  Menyimpan data baru
     */
    public function store()
    {
        $data = $this->input->post();
        if (!empty($_FILES['file']['name'])) {
            if ($this->uploadRegulation($data)) {
                $this->message('Sukses! Data berhasil di tambahkan', 'success');
                redirect('regulation');
            }
        } else {
            $this->message('Terjadi kesalahan. Mohon pilih file Regulasi yang ingin di upload!', 'danger');
        }
        $this->_view['title'] = 'Tambah Regulasi';
        $this->_view['page'] = 'regulation/create';
        $this->_data['regulation'] = $data;
        $this->_data['action'] = 'store';
        $this->init();
    }

    /**
     * @param $data
     */
    private function uploadRegulation($data)
    {
        $data['file'] = 'file-' . date('dmYhis');
        if ($this->do_upload($data['file'])) {
            $data['link'] = $this->upload->data('full_path');
            if ($this->regulation_model->insert($data) == FALSE) {
                delete_files($this->upload->data('full_path'));
                $this->message('Terjadi kesalahan. Mohon periksa kembali inputan Anda', 'danger');
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Upload file regulasi ke storage
     *
     * @param $name
     *
     * @return bool
     */
    public function do_upload($name)
    {
        $config['upload_path'] = '././assets/regulations';
        $config['max_size'] = 10000;
        $config['file_name'] = $name;
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->message($this->upload->display_errors(), 'danger');
            return FALSE;
        } else {
            return true;
        }
    }

    /**
     *  Tampilan edit regulasi
     */
    public function edit()
    {
        $id = $this->input->get('id');
        $data = $this->regulation_model->as_array()->get(array('id' => $id));
        $data['issued_at'] = date('Y-m-d', strtotime(str_replace('-', '/', $data['issued_at'])));
        $this->_view['title'] = 'Edit Regulasi';
        $this->_view['page'] = 'regulation/create';
        $this->_data['regulation'] = $data;
        $this->_data['action'] = 'update';
        $this->init();
    }

    /**
     *  Update data regulasi
     */
    public function update()
    {
        $id = $this->input->post('id');
        $data = $this->input->post();
        if (!empty($_FILES['file']['name'])) {
            $this->updateRegulation($data, $id);
        } else {
            if ($this->regulation_model->update($data, $id) == FALSE) {
                $this->message('Gagal! Data gagal di update', 'danger');
            } else {
                $this->message('Berhasil! Data berhasil di update', 'success');
            }
        }
        redirect('regulation');
    }

    /**
     * @param $data
     * @param $id
     */
    private function updateRegulation($data, $id)
    {
        $data['file'] = 'file-' . date('dmYhis');
        if ($this->do_upload($data['file'])) {
            $data['file'] = $this->upload->data('file_name');
            if ($this->regulation_model->update($data, $data['id']) == FALSE) {
                delete_files($this->upload->data('full_path'));
                $this->message('Gagal! Data gagal di update', 'danger');
            } else {
                $this->message('Berhasil! Data berhasil di update', 'success');
            }
        } else {
            $this->message('Gagal! Data gagal di update', 'danger');
        }
    }

    /**
     * Menonaktifkan status regulasi
     *
     * @param $id
     */
    public function destroy($id)
    {
        $id = $this->input->get('id');
        if ($this->regulation_model->delete($id)) {
            $this->message('Berhasil! Data berhasil di hapus', 'success');
        } else {
            $this->message('Gagal! Data gagal di hapus', 'danger');
        }
        redirect('regulation');
    }

}
