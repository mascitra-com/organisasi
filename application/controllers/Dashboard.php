<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		parent::__construct();

		# Set data
		$this->_view['template'] = 'template/dashboard/index';
		$this->_view['css'] = 'dashboard';
		$this->_view['js'] = 'dashboard';
		$this->load->model(array('news_model', 'gallery_model', 'agenda_model', 'visitor_model'));
	}

	public function index() {
		$this->_view['title'] = 'Halaman Dashboard';
		$this->_view['page'] = 'dashboard/index';
		$this->_data['visitors'] = $this->online_users->get_info();
        $this->_data['totalvisitor'] = (int) $this->visitor_model->total_visitor() + (int) $this->_data['visitors']['totalvisit'];
        $this->_data['totnews'] = $this->news_model->count_rows();
		$this->_data['totagenda'] = $this->agenda_model->count_rows();
		$this->_data['graph'] = $this->graph_data();
		$this->_data['totphotos'] = $this->gallery_model->count_rows(array('type_id' => 1));
		$this->_data['totvideos'] = $this->gallery_model->count_rows(array('type_id' => 2));
		// dump($this->visitor_monthly());

		//Berita populer
		$this->load->model('news_model');
		$this->_data['popular_articles'] = $this->news_model->where('type', 'active')->order_by(array('count' => 'desc', 'published_at' => 'desc'))->limit(3)->as_object()->get_all();

		$this->init();
	}

	private function graph_data(){
	    $results = $this->visitor_model->limit(12)->get_all();
	    $data['label'] = array();
	    $data['total'] = array();
	    foreach ($results as $result){
	        array_push($data['label'], $result->month);
	        array_push($data['total'], $result->total);
        }
        array_push($data['label'], date('F'));
        array_push($data['total'], $this->online_users->get_info()['totalvisit']);

        return json_encode($data);
    }

}
