<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->_view['template'] = 'template/dashboard/index';
		$this->load->model('profile_model');
	}

	public function index() {
		$this->_view['title'] = 'Profil';
		$this->_view['page'] = 'profile/index';
		$this->_data['profiles'] = $this->profile_model->get_all();
		$this->init();
	}

	public function create() {
		$this->_view['title'] = 'Tambah Profil';
		$this->_view['page'] = 'profile/create';
		$this->init();
	}

	public function store() {
		$data = $this->input->post();
		if ($this->profile_model->from_form()->insert()) {
			$this->message('<strong>Berhasil</strong> menyimpan Data Profil', 'success');
			redirect('profile');
		} else {
			$this->_data['profile'] = $data;
			$this->_view['title'] = 'Tambah Profil';
			$this->_view['page'] = 'profile/create';
			$this->init();
		}
	}

	public function show($id = NULL) {
		if ($id != NULL) 
		{
			$profiles = $this->profile_model->get(array('id' => $id));
				if ($profiles) 
				{
					$this->_data['profile'] = $profiles;
					$this->_view['title'] = 'Detail Profil';
					$this->_view['page'] = 'profile/detail';
					$this->init();
				}
				else
				{
					$this->message('<strong>Gagal</strong>. Profil tidak ditemukan', 'warning');
					$this->go('profile');
				}
		}
		else
		{
			$this->go('profile');
		}
	}

	public function edit($id = NULL) {
		if ($id != NULL) 
		{
			$profiles = $this->profile_model->get(array('id' => $id));
				if ($profiles) 
				{
					$this->_data['profile'] = $profiles;
					$this->_view['title'] = 'Edit Profil';
					$this->_view['page'] = 'profile/edit';
					$this->init();
				}
				else
				{
					$this->message('<strong>Gagal</strong>. Profil tidak ditemukan', 'warning');
					$this->go('profile');
				}
		}
		else
		{
			$this->go('profile');
		}
	}

	public function update() {
		$data = $this->input->post();
		if ($this->profile_model->from_form(NULL, NULL, array('id'))->update()) {
			$this->message('<strong>Berhasil</strong> mengedit Data Profil', 'success');
			redirect('profile');
		} else {
			$this->_data['profile'] = (object) $data;
			$this->_view['title'] = 'Edit Profil';
			$this->_view['page'] = 'profile/edit';
			$this->init();
		}
	}

	public function destroy($id) {
		if ($this->profile_model->delete($id)) {
			$this->message('<strong>Berhasil</strong> menghapus Data Profil', 'success');
		} else {
			$this->message('<strong>Gagal</strong> menghapus Data Profil', 'danger');
		}
		redirect('profile');
	}
}
