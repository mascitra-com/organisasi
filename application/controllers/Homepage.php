<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE;
		# Set data
		$this->_view['template'] = 'template/homepage/index';
	}

	public function index()
	{
		$this->_view['css'] 	= 'homepage';
		$this->_view['title'] 	= 'Organisasi';
		$this->_view['page'] 	= 'homepage/index';
		$this->init();
	}

	public function news()
	{
		$this->_view['css'] 	= 'news';
		$this->_view['title'] 	= 'Berita';
		$this->_view['page'] 	= 'homepage/news';
		$this->init();
	}

	public function news_article()
	{
		$this->_view['css'] 	= 'news';
		$this->_view['title'] 	= 'Judul Berita';
		$this->_view['page'] 	= 'homepage/news-article';
		$this->init();
	}
}
