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
        // dump($this->visitor_monthly());
        $this->init();
    }

    public function test()
    {
        $user = $this->ion_auth->user()->row();
        $logged_in_user_groups = $this->ion_auth->get_users_groups($user->id)->result();

        $groups_id = array();
        for ($i=0; $i < count($logged_in_user_groups) ; $i++) { 
            array_push($groups_id, $logged_in_user_groups[$i]->id);
        }

        $links = $this->db->select('menus.link')->from('privileges')->join('menus','menus.id = privileges.id_menu')->where_in('privileges.id_groups', $groups_id)->order_by('link', 'asc')->distinct()->get()->result();

        $allowed_links = array();

        for ($i=0; $i < count($links) ; $i++) { 
            array_push($allowed_links, $links[$i]->link);
        }        
        dump($allowed_links);
    }
}
