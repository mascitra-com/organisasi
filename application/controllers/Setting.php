<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		# Set data
		$this->_view['template'] = 'template/dashboard/index';
        $this->load->helper('file');
		// $this->_view['css'] 	 = 'dashboard';
		// $this->_view['js'] 		 = '';
	}

	public function index()
	{
		$this->go('info');
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
		$this->_view['js'] = 'headline';
		$this->_data['title'] = $this->get_active_news();
		$this->_data['articles'] = $this->news_model->where('status_headline','1')->as_array()->get_all();
		$this->init();
	}

	public function headline_store()
	{
		$data= $this->input->post();
		$input = explode("-", $data['headline']);		
		
		if ($this->news_model->fields('id')->where('id',$input[0])->get()) {
			if($this->news_model->where('id',$input[0])->update(array('status_headline'=>'1'))){
				$this->message('<strong>Sukses!</strong> Headline berhasil ditambahkan.','success');
				$this->go('setting/headline');	
			}else{
				$this->message('<strong>Gagal!</strong> Terjadi kesalahan dalam sistem. Headline tidak berhasil ditambahkan','danger');
				$this->go('setting/headline');
			}
		}else{
			$this->message('<strong>Gagal!</strong> Berita tidak ditemukan. Pilih Berita terlebih dahulu.','danger');
			$this->go('setting/headline');
		}
	}

	public function get_active_news()
	{
		$this->load->model('news_model');

		$articles = $this->news_model->fields('id, name')->where('type','active')->where('status_headline','0')->as_array()->get_all();

		$titles = array();
		foreach ($articles as $article) {
			array_push($titles, $article['id']. '-'.$article['name']);
		}
		return json_encode($titles);
	}

	public function headline_delete()
	{
		$id = $this->input->get('id', TRUE);
		if ($this->news_model->where('id', $id)->update(array('status_headline'=>'0'))) {
			$this->message('<strong>Berhasil</strong> menghapus Headline', 'success');
		} else {
			$this->message('<strong>Gagal</strong> menghapus Headline', 'danger');
		}
		redirect('setting/headline');
	}

	public function banner()
	{
		$this->_view['title'] = 'Banner';
		$this->_view['page'] = 'setting/banner';
		$this->_data['banners'] = $this->images_banners();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
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

    public function images_banners()
    {
        $files = get_dir_file_info(APPPATH.'../assets/banners');
        $banners = array();
        for($i = 0; $i < 3; $i++){
            foreach ($files as $file){
                if (strpos($file['server_path'], strval($i+1)) !== false) {
                    $banners[$i] = str_replace(FCPATH, base_url(), $file['server_path']);
                }
            }
            if(count($banners) == $i) $banners[$i] = base_url('assets/img/default.png');
        }
        return $banners;
	}

    public function update_banner($id = NULL)
    {
        $banners = $this->images_banners();
        foreach ($banners as $banner) {
            if (file_exists($banner) && strpos($banner, $id) !== false) {
                unlink('./assets/banners/'.$banner);
            }
        }
        if ($id == NULL) $this->go('banner');
        $config['file_name'] = 'banner-'.$id;
        $config['upload_path'] = './assets/banners/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 8000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $this->message($this->upload->display_errors(), 'danger');
        } else {
            $this->message("Banner $id berhasil disimpan', 'success");
        }
        $this->go('setting/banner');
    }

    public function remove_image($id)
    {
        $banners = $this->banners_file();
        foreach ($banners as $banner) {
            if (strpos($banner, strval($id)) !== false) {
                unlink(str_replace(base_url(), '', $banner));
                $this->message("Banner $id berhasil dihapus', 'success");
            } else {
                $this->message("Banner $id gagal dihapus', 'danger");
            }
        }
        $this->go('setting/banner');
    }

    /**
     * @return array
     */
    private function banners_file()
    {
        $files = get_dir_file_info(APPPATH . '../assets/banners');
        $banners = array();
        foreach ($files as $file) {
            array_push($banners, $file['server_path']);
        }
        return $banners;
    }
}
