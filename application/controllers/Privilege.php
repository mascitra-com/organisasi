<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class privilege extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->_view['template'] = 'template/dashboard/index';
		$this->_view['js'] = 'Privilege';
		$this->load->model('privilege_model');
	}

	public function index() {
		$this->_view['title'] = 'privilege';
		$this->_view['page'] = 'privilege/index';
		$this->_data['privileges'] = $this->privilege_model->get_all();
		$this->init();
	}

	public function kelola($id = NULL)
	{
		if ($id != NULL) {
			if ($this->ion_auth->group($id)->row()) {
				$this->load->model('menu_model');
				$this->_data['group'] = $this->ion_auth->group($id)->row();		
				$this->_data['menus'] = $this->menu_model->get_all();
				$this->_view['title'] = 'Kelola Privilege';
				$this->_view['page'] = 'privilege/kelola';
				$this->init();
			}else{
				$this->message('<strong>Gagal</strong>. Privilege tidak ditemukan', 'warning');
				$this->go('privilege');
			}
		}
		else{
			$this->go('privilege');
		}
	}

	public function create() {
		$this->_view['title'] = 'Tambah privilege';
		$this->_view['page'] = 'privilege/create';
		$this->init();
	}

	public function store() {
		$data = $this->input->post();
		$this->privilege_model->insert($data);
		echo json_encode(array("status" => TRUE));
	}

	public function show($id = NULL) {
		if ($id != NULL) {
			if ($this->privilege_model->get(array('id' => $id))) {
				$this->_data['privilege'] = $this->privilege_model->get(array('id' => $id));
				$this->_view['title'] = 'Detail privilege';
				$this->_view['page'] = 'privilege/detail';
				$this->init();
			}
			else{
				$this->message('<strong>Gagal</strong>. privilege tidak ditemukan', 'warning');
				$this->go('privilege');
			}
		}else{
			$this->go('privilege');
		}
	}

	public function edit($id = NULL) {
		if ($id != NULL) {
			if ($this->privilege_model->get(array('id' => $id))) {
				$this->_data['privilege'] = $this->privilege_model->get(array('id' => $id));
				$this->_view['title'] = 'Edit privilege';
				$this->_view['page'] = 'privilege/edit';
				$this->init();
			}
			else{
				$this->message('<strong>Gagal</strong>. privilege tidak ditemukan', 'warning');
				$this->go('privilege');
			}
		}else{
			$this->go('privilege');
		}
	}

	public function update($id = NULL) {
		$update_data = $this->input->post();
		if ($this->privilege_model->from_form(NULL, NULL, array('id' => $id))->update()) {
			$this->message('<strong>Berhasil</strong> mengedit Data privilege', 'success');
			redirect('privilege');
		} else {
            $update_data['id'] = $id;
			$this->_data['privilege'] = (object) $update_data;
            $this->_view['title'] = 'Edit privilege';
            $this->_view['page'] = 'privilege/edit';
            $this->init();
		}
	}

	public function destroy($id) {
		if ($this->privilege_model->delete($id)) {
			$this->message('<strong>Berhasil</strong> menghapus Data privilege', 'success');
		} else {
			$this->message('<strong>Gagal</strong> menghapus Data privilege', 'danger');
		}
		redirect('privilege');
	}
}
