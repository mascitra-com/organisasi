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
        $this->_view['js'] = 'profile';
        $this->load->model('profile_model');
	}

	public function index() {
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
        $this->page();
		$this->_view['title'] = 'Profil';
		$this->_view['page'] = 'profile/index';
		$this->init();
	}

    private function page()
    {
        $config['base_url'] = site_url('profile/index?per_page='.$this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->profile_model->count_rows();
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        $this->_data['profiles'] = $this->profile_model->fetch_data($config["per_page"], $this->data['page']);
        $this->_data['pagination'] = $this->pagination->create_links();
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

	public function show() {
	    $id = $this->input->get('id', TRUE);
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
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('profile');
		}
	}

	public function edit() {
        $id = $this->input->get('id', TRUE);
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
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('profile');
		}
	}

	public function update($id = NULL) {
        $update_data = $this->input->post();
		if ($this->profile_model->from_form(NULL, NULL, array('id'))->update()) {
			$this->message('<strong>Berhasil</strong> mengedit Data Profil', 'success');
			redirect('profile');
		} else {
            $update_data['id'] = $id;
			$this->_data['profile'] = (object) $update_data;
			$this->_view['title'] = 'Edit Profil';
			$this->_view['page'] = 'profile/edit';
			$this->init();
		}
	}

	public function destroy() {
        $id = $this->input->get('id', TRUE);
        if ($this->profile_model->delete($id)) {
			$this->message('<strong>Berhasil</strong> menghapus Data Profil', 'success');
		} else {
			$this->message('<strong>Gagal</strong> menghapus Data Profil', 'danger');
		}
		redirect('profile');
	}

    /**
     * @param $config
     *
     * @return mixed
     */
    private function config_for_bootstrap_pagination($config)
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = $this->lang->line('pagination_first_link');
        $config['last_link'] = $this->lang->line('pagination_last_link');
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev_link');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next_link');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }


    /**
     * @param $id
     */
    private function is_not_empty($id)
    {
        if ($id == NULL || $id == 0) {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('photos');
        }
    }
}
