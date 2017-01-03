<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->_view['template'] = 'template/dashboard/index';
		// $this->load->model('announcement_model');
	}

	public function index() {
		$this->_view['title'] = 'Pengumuman';
		$this->_view['page'] = 'announcement/index';
		// $this->_data['announcements'] = $this->announcement_model->get_all();
		$this->init();
	}

	public function create() {
		$this->_view['title'] = 'Tambah Announcement';
		$this->_view['page'] = 'announcement/create';
		$this->init();
	}

	public function store() {
		$data = $this->input->post();
		$data['announcement_date'] = date('Y-m-d h:i:s', strtotime($data['announcement_date']));

		if ($this->announcement_model->from_form()->insert()) {
			$this->message('<strong>Berhasil</strong> menyimpan Data Announcement', 'success');
			redirect('announcement');
		} else {
			$this->_data['announcement'] = $data;
			$this->_view['title'] = 'Tambah Announcement';
			$this->_view['page'] = 'announcement/create';
			$this->init();
		}
	}

	public function show($id = NULL) {
		if ($id != NULL) {
			if ($this->announcement_model->get(array('id' => $id))) {
				$this->_data['announcement'] = $this->announcement_model->get(array('id' => $id));
				$this->_view['title'] = 'Detail Announcement';
				$this->_view['page'] = 'announcement/detail';
				$this->init();
			}
			else{
				$this->message('<strong>Gagal</strong>. Announcement tidak ditemukan', 'warning');
				$this->go('announcement');
			}
		}else{
			$this->go('announcement');
		}
	}

	public function edit($id = NULL) {
		if ($id != NULL) {
			if ($this->announcement_model->get(array('id' => $id))) {
				$this->_data['announcement'] = $this->announcement_model->get(array('id' => $id));
				$this->_view['title'] = 'Edit Announcement';
				$this->_view['page'] = 'announcement/edit';
				$this->init();
			}
			else{
				$this->message('<strong>Gagal</strong>. Announcement tidak ditemukan', 'warning');
				$this->go('announcement');
			}
		}else{
			$this->go('announcement');
		}
	}

	public function update($id = NULL) {
		$update_data = $this->input->post();
		if ($this->announcement_model->from_form(NULL, NULL, array('id' => $id))->update()) {
			$this->message('<strong>Berhasil</strong> mengedit Data Announcement', 'success');
			redirect('announcement');
		} else {
            $update_data['id'] = $id;
			$this->_data['announcement'] = (object) $update_data;
            $this->_view['title'] = 'Edit Announcement';
            $this->_view['page'] = 'announcement/edit';
            $this->init();
		}
	}

	public function destroy($id) {
		if ($this->announcement_model->delete($id)) {
			$this->message('<strong>Berhasil</strong> menghapus Data Announcement', 'success');
		} else {
			$this->message('<strong>Gagal</strong> menghapus Data Announcement', 'danger');
		}
		redirect('announcement');
	}
}
