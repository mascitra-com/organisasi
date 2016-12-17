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
		$this->go('auth/groups');
	}

	public function kelola($id = NULL)
	{
		if ($id != NULL) {
			if ($this->ion_auth->group($id)->row()) {
				
				$this->load->model('privilege_model');
				$this->load->model('menu_model');

				$available_menus = $this->privilege_model->fields('id_menu')->where('id_groups', $id)->get_all();
				if (!empty($available_menus)) {
					$groups_menus = array();
					foreach ($available_menus as $menu) {
						$groups_menus[] = $menu->id_menu;
					}
					$this->_data['groups_menus'] = $groups_menus;
				}

				$this->_data['group'] = $this->ion_auth->group($id)->row();		
				$this->_data['menus'] = $this->menu_model->get_all();
				$this->_view['title'] = 'Kelola Privilege';
				$this->_view['page'] = 'privilege/kelola';
				$this->init();
			}else{
				$this->message('<strong>Gagal</strong>. Privilege tidak ditemukan', 'warning');
				$this->go('auth/groups');
			}
		}
		else{
			$this->go('auth/groups');
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

	public function cek_privilege()
	{
		$data = $this->input->post();
		$privilege_available = $this->privilege_model->where('id_groups', $data['id_groups'])->where('id_menu', $data['id_menu'])->get();
		if ($privilege_available) {
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array("status" => FALSE));
		}
	}

	public function destroy() {
		$data = $this->input->post();
		if ($this->privilege_model->delete(array('id_groups' => $data['id_groups'],'id_menu' => $data['id_menu']))) {
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}
}
