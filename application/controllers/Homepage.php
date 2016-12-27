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
		$this->_view['js'] 	= 'news';
		$this->_view['title'] 	= 'Organisasi';
		$this->_view['page'] 	= 'homepage/index';
		$this->init();
	}

	public function get_all_news()
	{
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->as_array()->get_all();
		if ($articles) {
			// echo json_encode($articles);
			echo json_encode(array("artikel" => $articles));
		}else{
			echo json_encode(array("status" => FALSE));
		}
	}

	public function news()
	{
		$this->_view['css'] 	= 'news';
		$this->_view['title'] 	= 'Berita';
		$this->_view['page'] 	= 'homepage/news';

		$this->load->model('news_model');
		$this->news_model->pagination_arrows = array('a','&gt;');

		$query= $this->news_model->with_user('fields:first_name,last_name')->where('type','active');
		$total_articles = $query->count_rows();
		$articles = $query->paginate(1, $total_articles);

		$this->_data['articles'] = $articles;
		$this->_data['prev_page'] = $this->news_model->previous_page;
		$this->_data['next_page'] = $this->news_model->next_page;

		$this->init();
	}

	public function news_article($slug = NULL)
	{
		if ($slug != NULL) {
			$article = $this->news_model->where('slug',$slug)->with_user('fields:first_name,last_name')->as_object()->get();
			if ($article) {
				$this->_view['css'] 	= 'news';
				$this->_view['title'] 	= 'Judul Berita';
				$this->_view['page'] 	= 'homepage/news-article';
				$this->_data['article'] = $article;
				$this->init();		
			}else{
				$this->message('Gagal! Berita tidak ditemukan', 'danger');
				$this->go('homepage/news');
			}
		}else{
			$this->message('Gagal! Berita tidak ditemukan', 'danger');
			$this->go('homepage/news');
		}
	}

	public function page()
	{
		$this->_view['css'] 	= 'page';
		$this->_view['title'] 	= 'Judul Halaman';
		$this->_view['page'] 	= 'homepage/page';
		$this->init();
	}
}
