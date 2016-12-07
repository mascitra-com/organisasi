<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

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
		$this->init();
	}
}
