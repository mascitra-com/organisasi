<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->_view['template'] = 'template/dashboard/index';
		$this->load->model('agenda_model');
	}

	public function index() {
		$this->_view['title'] = 'Agenda';
		$this->_view['page'] = 'agenda/index';
		$this->_data['agendas'] = $this->agenda_model->get_all();
		$this->init();
	}

	public function create() {
		$this->_view['title'] = 'Tambah Agenda';
		$this->_view['page'] = 'agenda/create';
		$this->init();
	}

	public function store() {
		$data = $this->input->post();
		$data['agenda_date'] = date('Y-m-d h:i:s', strtotime($data['agenda_date']));

		if ($this->agenda_model->from_form()->insert()) {
			$this->message('<strong>Berhasil</strong> menyimpan Data Agenda', 'success');
			redirect('agenda');
		} else {
			$this->_data['agenda'] = $data;
			$this->_view['title'] = 'Tambah Agenda';
			$this->_view['page'] = 'agenda/create';
			$this->init();
		}
	}

	public function show($id = 1) {
		$this->_data['agenda'] = $this->agenda_model->get(array('id' => $id));
		$this->_view['title'] = 'Detail Agenda';
		$this->_view['page'] = 'agenda/detail';
		$this->init();
	}

	public function edit($id = NULL) {
		if ($id != NULL) {
			if ($this->agenda_model->get(array('id' => $id))) {
				$this->_data['agenda'] = $this->agenda_model->get(array('id' => $id));
				$this->_view['title'] = 'Edit Agenda';
				$this->_view['page'] = 'agenda/edit';
				$this->init();
			}
			else{
				$this->message('<strong>Gagal</strong>. Agenda tidak ditemukan', 'warning');
				$this->go('agenda');
			}
		}else{
			$this->go('agenda');
		}
	}

	public function update($id = NULL) {
		$update_data = $this->input->post();
		if ($this->agenda_model->from_form(NULL, NULL, array('id' => $id))->update()) {
			$this->message('<strong>Berhasil</strong> mengedit Data Agenda', 'success');
			redirect('agenda');
		} else {
            $update_data['id'] = $id;
			$this->_data['agenda'] = (object) $update_data;
            $this->_view['title'] = 'Edit Agenda';
            $this->_view['page'] = 'agenda/edit';
            $this->init();
		}
	}

	public function destroy($id) {
		if ($this->agenda_model->delete($id)) {
			$this->message('<strong>Berhasil</strong> menghapus Data Agenda', 'success');
		} else {
			$this->message('<strong>Gagal</strong> menghapus Data Agenda', 'danger');
		}
		redirect('agenda');
	}
}
