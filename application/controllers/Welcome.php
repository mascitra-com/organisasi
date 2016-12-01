<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		# Set data
		$this->_view['template'] = '';
		$this->_view['css'] 	 = '';
		$this->_view['js'] 		 = '';
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
