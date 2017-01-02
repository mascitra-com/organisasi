<?php
/**
 * Andre Hardika
 * Web Developer, Front-End Developer & Graphic Designer
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->_view['template'] = 'template/dashboard/index';
		$this->load->model('menu_model');
	}

	public function index() {
		$this->_view['title'] = 'Menu';
		$this->_view['page'] = 'Menu/index';
		$this->_data['menus'] = $this->menu_model->order_by('link', 'asc')->get_all();
		$this->init();
	}

	public function create() {
		$this->_view['title'] = 'Tambah Menu';
		$this->_view['page'] = 'menu/create';
		$this->init();
	}

	public function store() {
		$data = $this->input->post();

		if ($this->menu_model->from_form()->insert()) {
			$this->message('<strong>Berhasil</strong> menyimpan Data Menu', 'success');
			redirect('menu');
		} else {
			$this->_data['menu'] = $data;
			$this->_view['title'] = 'Tambah menu';
			$this->_view['page'] = 'menu/create';
			$this->init();
		}
	}

	public function edit($id = NULL) {
		if ($id != NULL) {
			if ($this->menu_model->get(array('id' => $id))) {
				$this->_data['menu'] = $this->menu_model->get(array('id' => $id));
				$this->_view['title'] = 'Edit menu';
				$this->_view['page'] = 'menu/edit';
				$this->init();
			}
			else{
				$this->message('<strong>Gagal</strong>. Menu tidak ditemukan', 'warning');
				$this->go('menu');
			}
		}else{
			$this->go('menu');
		}
	}

	public function update($id = NULL) {
		$update_data = $this->input->post();
		if ($this->menu_model->from_form(NULL, NULL, array('id' => $id))->update()) {
			$this->message('<strong>Berhasil</strong> mengedit Data Menu', 'success');
			redirect('menu');
		} else {
            $update_data['id'] = $id;
			$this->_data['menu'] = (object) $update_data;
            $this->_view['title'] = 'Edit menu';
            $this->_view['page'] = 'menu/edit';
            $this->init();
		}
	}

	public function destroy($id) {
		if ($this->menu_model->delete($id)) {
			$this->message('<strong>Berhasil</strong> Menghapus Data menu', 'success');
		} else {
			$this->message('<strong>Gagal</strong> Menghapus Data menu', 'danger');
		}
		redirect('menu');
	}
}
