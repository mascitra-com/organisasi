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
		$this->_view['title'] = 'Info Website';
		$this->_view['page'] = 'setting/info';
		$this->init();
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
}
