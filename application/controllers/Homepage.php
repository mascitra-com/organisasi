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
		$this->_view['js'] = 'template-homepage';

		$this->load->model('profile_model');
		$this->_data['profiles'] = $this->profile_model->order_by('pos', 'asc')->as_object()->get_all();

		$this->load->model('category_model');
		$this->load->model('gallery_model');

		$this->_data['banners'] = $this->images_banners();

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
				$this->_view['css'] 	= 'page';
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
		$this->_data['headlines'] = $this->news_model->where('status_headline', '1')->order_by('updated_at', 'desc')->as_object()->get_all();
		
		$this->load->model('agenda_model');
		$this->_data['agendas'] = $this->agenda_model->order_by('agenda_date','desc')->as_object()->get_all();

		$this->load->model('regulation_model');
		$this->_data['regulations'] = $this->regulation_model->limit(3)->order_by('issued_at','desc')->as_object()->get_all();

		$this->load->model('announcement_model');
		$this->_data['announcements'] = $this->announcement_model->fields('body, priority, created_at')->where('expiration_date','>=', date('Y-m-d'))->order_by('priority','desc')->as_object()->get_all();

		$this->init();
	}

	public function search($type)
	{
		$this->session->unset_userdata('search_homepages');
		$this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
		$this->session->set_userdata('search_homepages', $this->_data['search']);

		if ($type === 'agenda') {
			$this->agenda(TRUE);
		}elseif ($type === 'regulasi') {
			$this->regulation(TRUE);
		}elseif ($type === 'news') {
			$this->news(TRUE);
		}elseif ($type === 'videos') {
			$this->videos(TRUE);
		}
		else{
			$this->session->unset_userdata('search_homepages');
			$this->message('<strong>Gagal!</strong> Terjadi kesalahan pada sistem!', 'danger');
			$this->go('homepage/index');
		}
	}

	public function agenda($search_status = FALSE)
	{
		if($search_status == FALSE){
			$this->session->unset_userdata('search_homepages');
		}

		$this->_view['css'] 	= 'agenda';
		$this->_view['title'] 	= 'Agenda';
		$this->_view['page'] 	= 'homepage/agenda';

		$this->_data['search'] = $this->session->userdata('search_homepages');
		
		$this->load->model('agenda_model');
		
		$config['base_url'] = site_url('homepage/agenda');
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'number';
		$config['total_rows'] = $this->agenda_model->count_all($this->_data['search']);
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['display_pages'] = FALSE;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['prev_link'] = '<li class="previous"><span aria-hidden="true">&larr; Lebih Baru</span></li>';
		$config['next_link'] = '<li class="next"><span aria-hidden="true">Lebih Lama  &rarr;</span></li>';

		$this->pagination->initialize($config);


		$this->_data['agendas'] = $this->agenda_model->get_latest($config['per_page'], $this->input->get('number') != NULL ? $this->input->get('number') : 0, $this->_data['search']);
		$this->_data['pagination'] = $this->pagination->create_links();
		$this->init();		
	}

	public function regulation($search_status = FALSE)
	{
		if($search_status == FALSE){
			$this->session->unset_userdata('search_homepages');
		}

		$this->_view['css'] 	= 'regulasi';
		$this->_view['title'] 	= 'regulasi';
		$this->_view['page'] 	= 'homepage/regulation';

		$this->_data['search'] = $this->session->userdata('search_homepages');
		
		$this->load->model('regulation_model');
		
		$config['base_url'] = site_url('homepage/regulation');
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'number';
		$config['total_rows'] = $this->regulation_model->count_data($this->_data['search']);
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['display_pages'] = FALSE;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['prev_link'] = '<li class="previous"><span aria-hidden="true">&larr; Lebih Baru</span></li>';
		$config['next_link'] = '<li class="next"><span aria-hidden="true">Lebih Lama  &rarr;</span></li>';

		$this->pagination->initialize($config);


		$this->_data['regulations'] = $this->regulation_model->fetch_data($config['per_page'], $this->input->get('number') != NULL ? $this->input->get('number') : 0, $this->_data['search']);
		$this->_data['pagination'] = $this->pagination->create_links();
		$this->init();	
	}

	public function news($search_status = FALSE)
	{
		if($search_status == FALSE){
			$this->session->unset_userdata('search_homepages');
		}

		$this->_view['css'] 	= 'news';
		$this->_view['title'] 	= 'Berita';
		$this->_view['page'] 	= 'homepage/news';
		
		$this->_data['search'] = $this->session->userdata('search_homepages');

		$this->load->model('news_model');
		
		$config['base_url'] = site_url('homepage/news');
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'number';
		$config['total_rows'] = $this->news_model->count_latest_active_news($this->_data['search']);
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$config['display_pages'] = FALSE;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['prev_link'] = '<li class="previous"><span aria-hidden="true">&larr; Lebih Baru</span></li>';
		$config['next_link'] = '<li class="next"><span aria-hidden="true">Lebih Lama  &rarr;</span></li>';

		$this->pagination->initialize($config);

		$this->_data['articles'] = $this->news_model->get_latest_active_news($config['per_page'], $this->input->get('number') != NULL ? $this->input->get('number') : 0, $this->_data['search']);
		$this->_data['pagination'] = $this->pagination->create_links();
		$this->init();
		
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

	public function gallery($search_status = FALSE)
	{
		if($search_status === FALSE){
			$this->session->unset_userdata('search_gallery');
		}
		$this->input_get_for_pagination(10);
		$this->_data['per_page_name'] = 'Galeri';
		$this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
		$this->page();

		$this->_view['css'] 	= 'gallery';
		$this->_view['title'] 	= 'galery';
		$this->_view['page'] 	= 'homepage/gallery';
		$this->init();
	}

	public function gallery_show($slug = NULL)
	{
		$this->_data['slug'] = $slug;
		$this->input_get_for_pagination(8);
		$this->might_make_errors($this->_data['galleries'] = $this->category_model->get(array('slug' => $this->_data['slug'])));
		$this->_data['per_page_name'] = 'Foto';
		$this->_data['per_page_options'] = array(8, 16, 32, 48, 60);
		$this->pages();
		$this->_view['title'] = 'Isi Galeri';
		$this->_view['css'] 	= 'gallery';
		$this->_view['page'] = 'homepage/gallery-album';
		$this->_view['js'] = 'gallery';
		$this->init();
	}

	public function videos($search_status = FALSE)
	{
		if($search_status == FALSE){
			$this->session->unset_userdata('search_homepages');
		}

		$this->_data['search'] = $this->session->userdata('search_homepages');

		$this->load->model('gallery_model');

		$this->_view['css'] 	= 'gallery';
		$this->_view['title'] 	= 'Video';
		$this->_view['page'] 	= 'homepage/videos';

		$config['base_url'] = site_url('homepage/videos');
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'number';
		$config['total_rows'] = $this->gallery_model->count_videos($this->_data['search']);
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$config['display_pages'] = FALSE;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['prev_link'] = '<li class="previous"><span aria-hidden="true">&larr; Lebih Baru</span></li>';
		$config['next_link'] = '<li class="next"><span aria-hidden="true">Lebih Lama  &rarr;</span></li>';

		$this->pagination->initialize($config);

		$this->_data['videos'] = $this->gallery_model->fetch_videos($config['per_page'], $this->input->get('number') != NULL ? $this->input->get('number') : 0, $this->_data['search']);
		$this->_data['pagination'] = $this->pagination->create_links();

		$this->init();
	}

	public function search_gallery()
	{
		$this->session->unset_userdata('search_gallery');
		$this->_data['search'] = $this->input->post() !== NULL ? (object) $this->input->post() : '';
		$this->session->set_userdata('search_gallery', $this->_data['search']);
		$this->gallery(TRUE);
	}

    /**
     *  Unset Search Data from Session
     */
    public function refresh_gallery()
    {
    	$this->session->unset_userdata('search_gallery');
    	$this->go('homepage/gallery');
    }


	  /**
     * For Pagination Configuration
     */
	  private function page()
	  {
	  	$this->_data['search'] = $this->session->userdata('search_gallery');
	  	$config['base_url'] = site_url('homepage/gallery');
	  	$config['page_query_string'] = TRUE;
	  	$config['query_string_segment'] = 'number';
	  	$config['per_page'] = $this->_data['per_page'];
	  	$config['total_rows'] = $this->category_model->count_data($this->_data['search']);
	  	$config['uri_segment'] = 3;
	  	$config['num_links'] = 5;
	  	$config = $this->config_for_bootstrap_pagination($config);
	  	$this->pagination->initialize($config);

	  	$this->_data['galleries'] = $this->category_model->fetch_data($config['per_page'], $this->_data['number'], $this->_data['search']);
	  	$this->_data['pagination'] = $this->pagination->create_links();
	  }

	  private function pages()
	  {
	  	$config['base_url'] = site_url('homepage/gallery_show/'.$this->_data['slug'].'&per_page='.$this->_data['per_page']);
	  	$config['page_query_string'] = TRUE;
	  	$config['query_string_segment'] = 'number';
	  	$config['per_page'] = $this->_data['per_page'];
	  	$config['total_rows'] = $this->gallery_model->count_rows(array('category_id' => $this->_data['galleries']->id));
	  	$config['uri_segment'] = 3;
	  	$config['num_links'] = 5;
	  	$config = $this->config_for_bootstrap_pagination($config);
	  	$this->pagination->initialize($config);

	  	$this->_data['photos'] = $this->gallery_model->fetch_data($config['per_page'], $this->_data['number'], $this->_data['galleries']->id);
	  	$this->_data['pagination'] = $this->pagination->create_links();
	  }

	 /**
     * Pagination Setting
     * @param $default_per_page - as default number of rows will appear on a page at first time
     */
	 private function input_get_for_pagination($default_per_page)
	 {
	 	$this->_data['number'] = $this->input->get('number') !== NULL ? $this->input->get('number') : 0;
	 	$this->_data['per_page'] = $this->input->get('per_page') !== NULL ? $this->input->get('per_page') : $default_per_page;
	 }

	 public function info()
	 {
	 	$this->_view['title'] = 'Informasi Website';
	 	$this->_view['page'] = 'homepage/info';
	 	$this->_view['css'] = 'info';
	 	$this->_data['infos'] = $this->info_model->get_all();
	 	$this->init();
	 }
	}
	