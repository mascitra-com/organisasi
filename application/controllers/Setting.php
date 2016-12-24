<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		# Set data
		$this->_view['template'] = 'template/dashboard/index';
		// $this->_view['css'] 	 = 'dashboard';
		// $this->_view['js'] 		 = '';
	}

	public function index()
	{
		$this->_view['title'] = 'Halaman Dashboard';
		$this->_view['page'] = '';
		$this->init();
	}

	public function info()
	{
		$this->load->model('info_model');
		$this->_view['title'] = 'Info Website';
		$this->_view['page'] = 'setting/info';
		$this->_data['info'] = $this->info_model->as_array()->get();
		$this->init();
	}

	public function info_update() {
		$this->load->model('info_model');
		$data = $this->input->post();
		if ($this->info_model->info_already_exist()) {
			$former_info_logo_link = $this->info_model->fields('logo_link')->get();

			$id = $this->info_model->fields('no')->get();

			if (!empty($_FILES['logo_link']['name'])) {
				$data['logo_link']= $this->do_upload('logo_link','website_logo');
			} else {
				$data['logo_link'] = $former_info_logo_link->logo_link;
			}
			
			if ($this->info_model->from_form(NULL, array('logo_link'=>$data['logo_link']), array('no' => $id->no))->update()) {
				$this->message('<strong>Berhasil</strong> menyunting Data Info Website', 'success');
				redirect('setting/info');
			}else{
				$this->_data['info'] = $data;
				$this->_view['title'] = 'Info Website';
				$this->_view['page'] = 'setting/info';
				$this->init();
			}
		}else{
			if (!empty($_FILES['logo_link']['name'])) {
				$data['logo_link']= $this->do_upload('logo_link','website_logo');
			} else {
				$data['logo_link'] = base_url('assets/img/default-2.png');
			}
			if ($this->info_model->from_form(NULL, array('logo_link'=>$data['logo_link']))->insert()) {
				$this->message('<strong>Berhasil</strong> menyimpan Data Info Website', 'success');
				redirect('setting/info');
			} else {
				$this->_data['info'] = $data;
				$this->_view['title'] = 'Info Website';
				$this->_view['page'] = 'setting/info';
				$this->init();
			}	
		}
	}

	public function headline()
	{
		$this->_view['title'] = 'Headline Berita';
		$this->_view['page'] = 'setting/headline';
		$this->init();
	}

	public function banner()
	{
		$this->_view['title'] = 'Banner';
		$this->_view['page'] = 'setting/banner';
		$this->init();
	}

	/*
	 */
	
	public function do_upload($input_name, $path)
	{
		$config['file_name'] = $_FILES[$input_name]['name'];
		$config['upload_path'] = './assets/img/'.$path.'/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 8000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($input_name)) {
			$this->message($this->upload->display_errors(), 'danger');
			$this->go('info');
		}else{
			$file_date = $this->upload->data();
			$link = base_url('assets/img/'.$path.'/' . $file_date['file_name']);
			return $link;
		}
	}
}
