<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        # Set data
        $this->_view['template'] = 'template/dashboard/index';
        $this->_view['css'] = 'dashboard';
        $this->_view['js'] = 'dashboard';
        $this->load->model(array('news_model', 'gallery_model'));
    }

    public function index()
    {
        $this->_view['title'] = 'Halaman Dashboard';
        $this->_view['page'] = 'dashboard/index';
        $this->_data['visitors'] = $this->online_users->get_info();
        $this->_data['totnews'] = $this->news_model->count_rows();
        $this->_data['totphotos'] = $this->gallery_model->count_rows(array('type_id' => 1));
        $this->_data['totvideos'] = $this->gallery_model->count_rows(array('type_id' => 2));
        $this->init();
    }

}
