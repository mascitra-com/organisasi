<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulation extends MY_Controller {

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
		$this->_view['title'] = 'Halaman Regulasi';
		$this->_view['page'] = 'regulation/index';
		$this->init();
	}

	public function create()
	{
		$this->_view['title'] = 'Tambah Regulasi';
		$this->_view['page'] = 'regulation/create';
		$this->init();
	}
}
