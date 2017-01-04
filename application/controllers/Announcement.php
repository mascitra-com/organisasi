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
		$this->_view['js'] = 'announcement';
		$this->load->model('announcement_model');
		$this->slug_config($this->announcement_model->table, 'name');
	}

	public function index($search_status = FALSE) {
		if($search_status == FALSE){
			$this->session->unset_userdata('search_announcements');
		}
		$this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
		$this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
		$this->_data['per_page_name'] = 'Profil';
		$this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
		$this->page();
		$this->_view['title'] = 'Pengumuman';
		$this->_view['page'] = 'announcement/index';
		$this->init();
	}

	public function create() {
		$this->_view['title'] = 'Tambah Announcement';
		$this->_view['page'] = 'announcement/create';
		$this->init();
	}

	public function store() {
		$data = $this->input->post();
		
		if (empty($data['priority'])) {
			$data['priority'] = '0';
		}

		$slug = $this->slug->create_uri($data);

		if ($this->announcement_model->from_form(NULL, array('priority' => $data['priority'], 'slug' => $slug))->insert()) {
			$this->message('<strong>Berhasil</strong> menyimpan Data Pengumuman', 'success');
			redirect('announcement');
		} else {
			$this->_data['announcement'] = $data;
			$this->_view['title'] = 'Tambah Announcement';
			$this->_view['page'] = 'announcement/create';
			$this->init();
		}
	}

	public function edit($slug = NULL) {
		if ($slug != NULL) {
			if ($this->announcement_model->get(array('slug' => $slug))) {
				$this->_data['announcement'] = $this->announcement_model->as_array()->get(array('slug' => $slug));
				$this->_view['title'] = 'Edit Announcement';
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

	public function update($former_slug = NULL) {
		if ($former_slug != NULL) {
			$data = $this->input->post();

			if (empty($data['priority'])) {
				$data['priority'] = '0';
			}

			$slug = $this->slug->create_uri($data);

			if ($this->announcement_model->from_form(NULL, array('priority' => $data['priority'], 'slug' => $slug), array('slug' => $former_slug))->update()) {
				$this->message('<strong>Berhasil</strong> mengedit Data Announcement', 'success');
				redirect('announcement');
			} else {
				$update_data['id'] = $id;
				$this->_data['announcement'] = (object) $update_data;
				$this->_view['title'] = 'Edit Announcement';
				$this->_view['page'] = 'announcement/edit';
				$this->init();
			}	
		}else{
			$this->go('announcement');
		}
	}

	public function update_priority($id = NULL) {
		if ($id != NULL) {
			$announcement = $this->announcement_model->fields('priority')->as_object()->where('id', $id)->get();
			$priority = $announcement->priority;
			if ($priority == '0') {
				$priority = '1';
			}else{
				$priority = '0';
			}

			if ($this->announcement_model->where('id', $id)->update(array('priority' => $priority))) {
				$this->message('<strong>Berhasil</strong> merubah Prioritas Pengumuman', 'success');
			} else {
				$this->message('<strong>Gagal</strong> merubah Prioritas Pengumuman', 'danger');
			}	
			redirect('announcement');
		}else{
			$this->go('announcement');
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

	public function search()
	{
		$this->session->unset_userdata('search_announcements');
		$this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
		$this->session->set_userdata('search_announcements', $this->_data['search']);
		$this->index(TRUE);
	}

	public function refresh()
	{
		$this->session->unset_userdata('search_announcements');
		$this->go('announcement');
	}

	private function page()
	{
		$this->_data['search'] = $this->session->userdata('search_announcements');
		$config['base_url'] = site_url('announcement/index?per_page='.$this->_data['per_page']);
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'number';
		$config['per_page'] = $this->_data['per_page'];
		$config['total_rows'] = $this->announcement_model->count_data($this->_data['search']);
		$config["uri_segment"] = 3;
		$config["num_links"] = 5;

        //config for bootstrap pagination class integration
		$config = $this->config_for_bootstrap_pagination($config);

		$this->pagination->initialize($config);
		$this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
		$this->_data['announcements'] = $this->announcement_model->fetch_data($config["per_page"], $this->data['page'], $this->_data['search']);
		$this->_data['pagination'] = $this->pagination->create_links();
	}
}
