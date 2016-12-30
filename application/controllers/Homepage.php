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

		$this->load->model('profile_model');
		$this->_data['profiles'] = $this->profile_model->order_by('pos', 'asc')->as_object()->get_all();

		if (is_null($this->session->userdata('visitor'))) {
			$this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
		}else{
			if ($this->session->userdata('visitor')['ip'] !== $this->input->ip_address()) {
				$this->session->sess_destroy();
				$this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
			}
		}
	}

	public function profile_show($slug = NULL)
	{

		if ($slug != NULL) {

			$profile = $this->profile_model->where('slug',$slug)->as_object()->get();
			if ($profile) {
				$this->_view['css'] 	= 'news';
				$this->_view['title'] 	= $profile->headline;
				$this->_view['page'] 	= 'homepage/page';
				$this->_data['profile'] = $profile;
				$this->init();		
			}else{
				$this->message('Gagal! Profil tidak ditemukan', 'danger');
				$this->go('homepage');
			}
		}else{
			$this->message('Gagal! Profil tidak ditemukan', 'danger');
			$this->go('homepage');
		}
	}

	public function index()
	{
		$this->load->helper('download');

		$this->_view['css'] 	= 'homepage';
		$this->_view['js'] 		= 'news';
		$this->_view['title'] 	= 'Organisasi';
		$this->_view['page'] 	= 'homepage/index';

		$this->load->model('news_model');
		$this->_data['articles'] = $this->news_model->where('type','active')->order_by('name','asc')->as_object()->get_all();
		$this->_data['latest_articles'] = $this->news_model->where('type','active')->order_by('published_at','desc')->limit(4)->as_object()->get_all();
		$this->_data['popular_articles'] = $this->news_model->where('type','active')->order_by(array('count' => 'desc', 'published_at' => 'desc'	))->limit(4)->as_object()->get_all();
		
		$this->load->model('agenda_model');
		$this->_data['agenda'] = $this->agenda_model->order_by('agenda_date','desc')->as_object()->get();

		$this->load->model('regulation_model');
		$this->_data['regulation'] = $this->regulation_model->fields('body, link')->order_by('issued_at','desc')->as_object()->get();

		$this->_data['banners'] = $this->images_banners();

		$this->init();
	}

	public function agenda()
	{
		$this->load->model('agenda_model');
		$this->_data['agendas'] = $this->agenda_model->order_by('agenda_date','desc')->as_object()->get_all();

		$this->_view['css'] 	= 'agenda';
		$this->_view['title'] 	= 'Agenda';
		$this->_view['page'] 	= 'homepage/agenda';
		$this->init();		
	}

	public function regulation()
	{
		// $this->load->model('agenda_model');
		// $this->_data['agendas'] = $this->agenda_model->order_by('agenda_date','desc')->as_object()->get_all();

		$this->_view['css'] 	= 'regulasi';
		$this->_view['title'] 	= 'regulasi';
		$this->_view['page'] 	= 'homepage/regulation';
		$this->init();		
	}

	public function news($page = NULL)
	{
		$this->load->model('news_model');
		$this->news_model->pagination_arrows = array('<span aria-hidden="true">&larr;</span> Lebih Baru','Lebih Lama <span aria-hidden="true">&rarr;</span>');

		$query= $this->news_model->with_user('fields:first_name,last_name')->where('type','active')->order_by('published_at','asc');
		$total_articles = $query->count_rows();
		$articles = $query->paginate(4, $total_articles);

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
			
			if (!$this->ion_auth->logged_in()) {
				if (!in_array($slug, $this->session->userdata('visitor')['visited_articles'])) {
					@$this->news_model->counter($slug);
				}
			}

			$article = $this->news_model->where('slug',$slug)->with_user('fields:first_name,last_name')->as_object()->get();
			if ($article) {
				$this->_view['css'] 	= 'news';
				$this->_view['title'] 	= $article->name;
				$this->_view['page'] 	= 'homepage/news-article';
				$this->_data['article'] = $article;
				$this->_data['popular_articles'] = $this->news_model->where('type','active')->order_by(array('count' => 'desc', 'published_at' => 'desc'))->limit(4)->as_object()->get_all();
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

	/*
	 */
	protected function get_all_news()
	{
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->order_by('name','asc')->as_array()->get_all();
		if ($articles) {
			for ($i=0; $i<count($articles); $i++) {
				if (!file_exists('./assets/img/news_img/'.$articles[$i]['img_link']) || empty($articles[$i]['img_link'])) {
					$articles[$i]['img_link'] = 'default-2.png';
				}
			}
			echo json_encode($articles);
		}
	}

	protected function get_latest_news()
	{
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->order_by('published_at','desc')->as_array()->get_all();
		if ($articles) {
			for ($i=0; $i<count($articles); $i++) {
				if (!file_exists('./assets/img/news_img/'.$articles[$i]['img_link']) || empty($articles[$i]['img_link'])) {
					$articles[$i]['img_link'] = 'default-2.png';
				}
			}
			echo json_encode($articles);
		}
	}

	protected function get_popular_news()
	{
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->order_by(array('count' => 'desc', 'published_at' => 'desc'	))->as_array()->get_all();
		if ($articles) {
			for ($i=0; $i<count($articles); $i++) {
				if (!file_exists('./assets/img/news_img/'.$articles[$i]['img_link']) || empty($articles[$i]['img_link'])) {
					$articles[$i]['img_link'] = 'default-2.png';
				}
			}
			echo json_encode($articles);
		}
	}

	protected function get_searched_news()
	{
		$data = $this->input->post();
		$this->load->model('news_model');
		$articles = $this->news_model->fields('name,slug,img_link')->where('type','active')->where('name','like',$data['name'])->order_by('name','asc')->as_array()->get_all();
		if ($articles) {
			for ($i=0; $i<count($articles); $i++) {
				if (!file_exists('./assets/img/news_img/'.$articles[$i]['img_link']) || empty($articles[$i]['img_link'])) {
					$articles[$i]['img_link'] = 'default-2.png';
				}
			}
			echo json_encode(array("artikel" => $articles));
		}else{
			echo json_encode(array("status" => FALSE));
		}
	}

	private function images_banners()
	{
		$this->load->helper('file');
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
}
