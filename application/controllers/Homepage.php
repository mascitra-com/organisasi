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
		$this->_view['js'] 		= 'news';
		$this->_view['title'] 	= 'Organisasi';
		$this->_view['page'] 	= 'homepage/index';

		$this->load->model('news_model');
		$this->_data['articles'] = $this->news_model->where('type','active')->order_by('name','asc')->as_object()->get_all();
		$this->_data['latest_articles'] = $this->news_model->where('type','active')->order_by('published_at','desc')->limit(4)->as_object()->get_all();
		
		$this->load->model('agenda_model');
		$this->_data['agenda'] = $this->agenda_model->order_by('agenda_date','desc')->as_object()->get();

		$this->init();
	}

	protected function get_all_news()
	{
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->order_by('name','asc')->as_array()->get_all();
		if ($articles) {
			echo json_encode(array("artikel" => $articles));
		}else{
			echo json_encode(array("status" => FALSE));
		}
	}

	protected function get_latest_news()
	{
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->order_by('published_at','desc')->as_array()->get_all();
		if ($articles) {
			echo json_encode(array("artikel" => $articles));
		}else{
			echo json_encode(array("status" => FALSE));
		}
	}

	protected function get_searched_news()
	{
		$data = $this->input->post();
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->where('name','like',$data['name'])->order_by('name','asc')->as_array()->get_all();
		if ($articles) {
			echo json_encode(array("artikel" => $articles));
		}else{
			echo json_encode(array("status" => FALSE));
		}
	}

	public function news($page = NULL)
	{
		$this->load->model('news_model');
		$this->news_model->pagination_arrows = array('<span aria-hidden="true">&larr;</span> Lebih Baru','Lebih Lama <span aria-hidden="true">&rarr;</span>');

		$query= $this->news_model->with_user('fields:first_name,last_name')->where('type','active');
		$total_articles = $query->count_rows();
		$articles = $query->paginate(1, $total_articles);

		if ($page > $total_articles) {
			$this->go('homepage/news');
		}else{
			$this->_view['css'] 	= 'news';
			$this->_view['title'] 	= 'Berita';
			$this->_view['page'] 	= 'homepage/news';
			$this->_data['articles'] = $articles;
			$this->_data['prev_page'] = $this->news_model->previous_page;
			$this->_data['next_page'] = $this->news_model->next_page;
			$this->init();
		}
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
