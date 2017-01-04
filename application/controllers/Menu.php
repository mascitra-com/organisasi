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

    public function index($search_status = FALSE) {
        if($search_status == FALSE){
            $this->session->unset_userdata('search_profiles');
        }
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
        $this->_data['per_page_name'] = 'Menu';
        $this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
        $this->page();
		$this->_view['title'] = 'Menu';
		$this->_view['page'] = 'Menu/index';
		$this->init();
	}

    private function page()
    {
        $config['base_url'] = site_url('menu/index?per_page='.$this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->menu_model->count_rows();
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        $this->_data['menus'] = $this->menu_model->fetch_data($config["per_page"], $this->data['page']);
        $this->_data['pagination'] = $this->pagination->create_links();
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
