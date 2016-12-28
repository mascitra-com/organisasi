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
    public function index($search_status = FALSE) {
        if($search_status == FALSE){
            $this->session->unset_userdata('search_profiles');
        }
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
        $this->_data['per_page_name'] = 'Profil';
        $this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
        $this->page();
        $this->_view['title'] = 'Regulasi';
        $this->_view['page'] = 'regulation/index';
        $this->init();
    }

    public function search()
    {
        $this->session->unset_userdata('search_regulation');
        $this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
        $this->session->set_userdata('search_regulation', $this->_data['search']);
        $this->index(TRUE);
    }

    public function refresh()
    {
        $this->session->unset_userdata('search_regulation');
        $this->go('regulation');
    }

    private function page()
    {
        $this->_data['search'] = $this->session->userdata('search_regulation');
        $config['base_url'] = site_url('regulation/index?per_page='.$this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->regulation_model->count_data($this->_data['search']);
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        $this->_data['regulations'] = $this->regulation_model->fetch_data($config["per_page"], $this->data['page'], $this->_data['search']);
        $this->_data['pagination'] = $this->pagination->create_links();
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
        if (!file_exists('././assets/regulations')) {
            mkdir('././assets/regulations');
        }
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
            $data['link'] = $this->upload->data('file_name');
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
