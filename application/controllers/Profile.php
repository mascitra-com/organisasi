<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/profile/index';
        $this->load->model('profile_model');
    }

    public function index()
    {
        $this->_view['title'] = 'Profil';
        $this->_view['page'] = 'profile/index';
        $this->_data['profiles'] = $this->profile_model->get_all();
        $this->init();
    }

    public function create()
    {
        $this->_view['title'] = 'Tambah Profil';
        $this->_view['page'] = 'profile/create';
        $this->init();
    }

    public function store()
    {
        $data = $this->input->post();
        if ($this->profile_model->insert($data)) {
            $this->message('<strong>Berhasil</strong> menyimpan Data Profil', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menyimpan Data Profil', 'danger');
        }
        redirect('profile');
    }

    public function show($id = 1)
    {
        $this->_data['profile'] = $this->profile_model->get(array('id' => $id));
        $this->_view['title'] = 'Detail Profil';
        $this->_view['page'] = 'profile/detail';
        $this->init();
    }

    public function edit($id = 1)
    {
        $this->_data['profile'] = $this->profile_model->get(array('id' => $id));
        $this->_view['title'] = 'Edit Profil';
        $this->_view['page'] = 'profile/edit';
        $this->init();
    }

    public function update()
    {
        $update_data = $this->input->post();
        $update_id = $update_data['id'];
        unset($update_data['id']);
        if ($this->profile_model->update($update_data, $update_id)) {
            $this->message('<strong>Berhasil</strong> mengedit Data Profil', 'success');
        } else {
            $this->message('<strong>Gagal</strong> mengedit Data Profil', 'danger');
        }
        redirect('profile');
    }

    public function destroy($id)
    {
        if($this->profile_model->delete(array($id))){
            $this->message('<strong>Berhasil</strong> menghapus Data Profil', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Data Profil', 'danger');
        }
        redirect('profile');
    }
}