<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		# Set data
		$this->_view['template'] = 'template/homepage/index';
		$this->_view['css'] 	 = 'homepage';
		// $this->_view['js'] 		 = '';
	}

	public function index()
	{
		$this->_view['title'] = 'Organisasi';
		$this->_view['page'] = 'homepage/index';
		$this->init();
	}
}
