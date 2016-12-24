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
        $this->slug_config($this->profile_model->table, 'name');
	}

	public function index($search_status = FALSE) {
	    if($search_status == FALSE){
            $this->session->unset_userdata('search_profiles');
        }
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
		$this->_data['per_page_name'] = 'Profil';
		$this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
        $this->page();
		$this->_view['title'] = 'Profil';
		$this->_view['page'] = 'profile/index';
		$this->init();
	}

    public function search()
    {
        $this->session->unset_userdata('search_profiles');
        $this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
        $this->session->set_userdata('search_profiles', $this->_data['search']);
        $this->index(TRUE);
	}

    public function refresh()
    {
        $this->session->unset_userdata('search_profiles');
        $this->go('profile');
	}

    private function page()
    {
        $this->_data['search'] = $this->session->userdata('search_profiles');
        $config['base_url'] = site_url('profile/index?per_page='.$this->_data['per_page']);
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        $config['total_rows'] = $this->profile_model->count_data($this->_data['search']);
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        $this->_data['profiles'] = $this->profile_model->fetch_data($config["per_page"], $this->data['page'], $this->_data['search']);
        $this->_data['pagination'] = $this->pagination->create_links();
    }

	public function create() {
		$this->_view['title'] = 'Tambah Profil';
		$this->_view['page'] = 'profile/create';
		$this->init();
	}

	public function store() {
		$data = $this->input->post();
        if ($id = $this->profile_model->from_form()->insert()) {
            $slug = $this->slug->create_uri($data);
            $this->profile_model->update(array('slug' => $slug), $id);
			$this->message('<strong>Berhasil</strong> menyimpan Data Profil', 'success');
			redirect('profile');
		} else {
			$this->_data['profile'] = $data;
			$this->_view['title'] = 'Tambah Profil';
			$this->_view['page'] = 'profile/create';
			$this->init();
		}
	}

	public function show($slug = NULL) {
	    $id = $this->profile_model->get(array('slug' => $slug))->id;
		if ($id !== NULL)
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

	public function edit($slug = NULL) {
        if ($slug !== NULL)
		{
			$profiles = $this->profile_model->get(array('slug' => $slug));
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

	public function update() {
        $update_data = $this->input->post();
        if ($id = $this->profile_model->from_form(NULL, NULL, array('slug'))->update()) {
            $slug = $this->slug->create_uri($update_data['name'], $id);
            $this->profile_model->update(array('slug' => $slug), $id);
            $this->message('<strong>Berhasil</strong> mengedit Data Profil', 'success');
			redirect('profile');
		} else {
			$this->_data['profile'] = (object) $update_data;
			$this->_view['title'] = 'Edit Profil';
			$this->_view['page'] = 'profile/edit';
			$this->init();
		}
	}

	public function destroy($slug = NULL) {
        $id = $this->profile_model->get(array('slug' => $slug))->id;
        if ($this->profile_model->delete($id)) {
			$this->message('<strong>Berhasil</strong> menghapus Data Profil', 'success');
		} else {
			$this->message('<strong>Gagal</strong> menghapus Data Profil', 'danger');
		}
		redirect('profile');
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
