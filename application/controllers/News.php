<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/dashboard/index';
        $this->_view['css']      = 'news';
        $this->_view['js']       = 'news';
        $this->load->model('news_model');
        $this->slug_config($this->news_model->table, 'name');
    }

    public function index($search_status = FALSE)
    {
        if($search_status == FALSE){
            $this->session->unset_userdata('search_news');
        }
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
        $this->_data['per_page_name'] = 'Berita';
        $this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
        $this->page("index");
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/index';
        $this->init();
    }

    public function draft($search_status = FALSE)
    {
        if($search_status == FALSE){
            $this->session->unset_userdata('search_news');
        }
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
        $this->_data['per_page_name'] = 'Berita';
        $this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
        $this->page("draft");
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/draft';
        $this->init();
    }

    public function archive($search_status = FALSE)
    {
        if($search_status == FALSE){
            $this->session->unset_userdata('search_news');
        }
        $this->_data['number'] = $this->input->get('number') != NULL ? $this->input->get('number') : 0;
        $this->_data['per_page'] = $this->input->get('per_page') != NULL ? $this->input->get('per_page') : 10;
        $this->_data['per_page_name'] = 'Berita';
        $this->_data['per_page_options'] = array(10, 25, 50, 75, 100);
        $this->page("archive");
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/archive';
        $this->init();
    }

    public function search()
    {
        $this->session->unset_userdata('search_news');
        $this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
        $this->session->set_userdata('search_news', $this->_data['search']);
        $this->index(TRUE);
    }

    public function search_draft()
    {
        $this->session->unset_userdata('search_news');
        $this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
        $this->session->set_userdata('search_news', $this->_data['search']);
        $this->draft(TRUE);
    }

    public function search_archive()
    {
        $this->session->unset_userdata('search_news');
        $this->_data['search'] = $this->input->post() != NULL ? (object) $this->input->post() : '';
        $this->session->set_userdata('search_news', $this->_data['search']);
        $this->archive(TRUE);
    }

    public function refresh()
    {
        $this->session->unset_userdata('search_news');
        $this->go('news');
    }

    public function refresh_draft()
    {
        $this->session->unset_userdata('search_news');
        $this->go('news/draft');
    }

    public function refresh_archive()
    {
        $this->session->unset_userdata('search_news');
        $this->go('news/archive');
    }

    private function page($page)
    {
        $this->_data['search'] = $this->session->userdata('search_news');
        if ($page === "index") {
            $config['base_url'] = site_url('news/index?per_page='.$this->_data['per_page']);
        }elseif ($page === "draft") {
            $config['base_url'] = site_url('news/draft?per_page='.$this->_data['per_page']);
        }elseif ($page === "archive") {
            $config['base_url'] = site_url('news/archive?per_page='.$this->_data['per_page']);
        }
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'number';
        $config['per_page'] = $this->_data['per_page'];
        if ($page === 'index') {
            $config['total_rows'] = $this->news_model->count_data_index($this->_data['search']);
        }elseif ($page === 'draft') {
            $config['total_rows'] = $this->news_model->count_data_draft($this->_data['search']);
        }elseif ($page === 'archive') {
            $config['total_rows'] = $this->news_model->count_data_archive($this->_data['search']);
        }
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;

        //config for bootstrap pagination class integration
        $config = $this->config_for_bootstrap_pagination($config);

        $this->pagination->initialize($config);
        $this->data['page'] = $this->_data['number'];

        //call the model function to get the department data
        if ($page === "index") {
            $this->_data['articles'] = $this->news_model->fetch_data_index($config["per_page"], $this->data['page'], $this->_data['search']);
        }elseif ($page === "draft") {
            $this->_data['articles'] = $this->news_model->fetch_data_draft($config["per_page"], $this->data['page'], $this->_data['search']);
        }elseif ($page === "archive") {
            $this->_data['articles'] = $this->news_model->fetch_data_archive($config["per_page"], $this->data['page'], $this->_data['search']);
        }
        $this->_data['pagination'] = $this->pagination->create_links();
    }

    public function create()
    {
        $this->_view['title'] = 'Tambah Berita';
        $this->_view['page'] = 'news/create';
        $this->init();
    }
    
    public function store()
    {
        $today = date('Y-m-d');

        $data = $this->input->post();

        if(empty($data['type'])){
            if ($data['published_at'] > $today) {
                $data['type'] = 'unactive';
            }elseif ($data['published_at'] == $today) {
                $data['type'] = 'active';
            }
            else{
                $this->message('Tanggal kadaluarsa', 'danger');
                $this->go('news/create');
            }
        }

        $data['slug'] = $this->slug->create_uri($data);

        if (!empty($_FILES['img']['name'])) {
            $config['file_name'] = $_FILES['img']['name'];
            $config['upload_path'] = './assets/img/news_img/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('img')) {
                $this->message($this->upload->display_errors(), 'danger');
            }else{
                $file_date = $this->upload->data();
                $link = base_url('assets/img/news_img/' . $file_date['file_name']);
                $data['img_link'] = $link;
            }
        } else {
            $data['img_link'] = base_url('assets/img/default.png');
        }

        if ($this->news_model->from_form(NULL,array('body'=>$data['body'], 'slug'=>$data['slug'], 'img_link'=>$data['img_link'], 'published_at'=>$data['published_at'],'type'=>$data['type']))->insert()) {
            if ($data['type'] == 'draft') {
                $this->message('<strong>Berhasil</strong> Berita Disimpan di Draft', 'success');
                redirect('news/draft');
            }else{
                $this->message('<strong>Berhasil</strong> menyimpan Berita Baru', 'success');
                redirect('news');
            }
        } else {
            $this->_data['article'] = $data;
            $this->_view['title'] = 'Tambah Berita';
            $this->_view['page'] = 'news/create';
            $this->init();
        }
    }

    public function show($slug = NULL) {
        if ($slug != NULL) {
            if ($this->news_model->get(array('slug' => $slug))) {
                $this->_data['article'] = $this->news_model->with_user('fields:first_name,last_name')->get(array('slug' => $slug));
                $this->_view['title'] = 'Detail Berita';
                $this->_view['page'] = 'news/detail';
                $this->init();
            }
            else{
                $this->message('<strong>Gagal</strong>. Agenda tidak ditemukan', 'warning');
                $this->go('news');
            }
        }else{
            $this->go('news');
        }
    }

    public function edit()
    {
        $slug = $this->input->get('slug', TRUE);
        if ($slug != NULL)
        {
            $article = $this->news_model->get(array('slug' => $slug));
            if ($article) 
            {
                $this->_data['article'] = $this->news_model->with_user('fields:first_name,last_name')->get(array('slug' => $slug));
                $this->_view['title'] = 'Edit Berita';
                $this->_view['page'] = 'news/edit';
                $this->init();
            }
            else
            {
                $this->message('<strong>Gagal</strong>. Berita tidak ditemukan', 'warning');
                $this->go('news');
            }
        }
        else
        {
            $this->message('Terjadi Kesalahan Sistem', 'danger');
            $this->go('news');
        }
    }

    public function update($id = NULL)
    {
        if ($id != NULL) {
            $update_data = $this->input->post();
            $former_news_type = $this->news_model->fields('type')->where('id', $id)->get();
            $former_news_img_link = $this->news_model->fields('img_link')->where('id', $id)->get();
            $today = date('Y-m-d');

            $update_data['published_at'] = date('Y-m-d', strtotime($update_data['published_at']));

            if ($update_data['type'] != 'draft') {
                if ($update_data['published_at'] > $today) {
                    $update_data['type'] = 'unactive';
                }elseif ($update_data['published_at'] == $today) {
                    $update_data['type'] = 'active';
                }
                else{
                    $this->message('Tanggal kadaluarsa', 'danger');
                    $this->news_check_redirect_previous($update_data);
                }
            }

            if (!empty($_FILES['img']['name'])) {
                $config['file_name'] = $_FILES['img']['name'];
                $config['upload_path'] = './assets/img/news_img/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img')) {
                    $this->message($this->upload->display_errors(), 'danger');
                }else{
                    $file_date = $this->upload->data();
                    $link = base_url('assets/img/news_img/' . $file_date['file_name']);
                    $update_data['img_link'] = $link;
                }
            } else {
                $update_data['img_link'] = $former_news_img_link->img_link;
            }
            
            $update_data['slug'] = url_title($update_data['name'], 'dash', TRUE);
            if ($this->news_model->from_form(NULL,array('body'=>$update_data['body'], 'slug'=>$update_data['slug'], 'img_link'=>$update_data['img_link'], 'published_at'=>$update_data['published_at'],'type'=>$update_data['type']), array('id' => $id))->update()) {
                $this->message('<strong>Berhasil</strong> mengedit Berita', 'success');
                $this->news_check_redirect_previous($former_news_type);
            } else {
                $update_data['id'] = $id;
                $this->_data['article'] = (object)$update_data;
                $this->_view['title'] = 'Edit Berita';
                $this->_view['page'] = 'news/edit';
                $this->init();
            }
        }else{
            $this->message('<strong>Gagal</strong> Berita tidak ditemukan', 'danger');
            $this->news_check_redirect_previous($former_news_type);
        }
    }

    public function destroy() {
        $id = $this->input->get('id', TRUE);
        if ($this->news_model->delete($id)) {
            $this->message('<strong>Berhasil</strong> menghapus Berita', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Berita', 'danger');
        }
        redirect('news/archive');
    }

    public function move_to_archive()
    {
        $slug = $this->input->get('slug', TRUE);
        $former_news_type = $this->news_model->fields('type')->where('slug', $slug)->get();
        if ($this->news_model->update(array('type' => 'archive'), array('slug' => $slug))) {
            $this->message('<strong>Berhasil</strong> Berita telah dipindah di Arsip', 'success');
            $this->news_check_redirect_previous($former_news_type);
        } else {
            $this->news_check_redirect_previous($former_news_type);
            $this->message('<strong>Gagal</strong> mengarsipkan Berita', 'danger');
        }
    }

    public function update_news_type()
    {
        $data = $this->input->post();
        $news_type = $this->news_model->where('id', $data['id'])->get();
        if ($news_type->type == 'active') {
            if ($this->news_model->update(array('type' => 'unactive'), array('id' => $data['id']))){
                echo json_encode(array("status" => "unactive"));
            }else{
                echo json_encode(array("status" => FALSE));
            }
        }elseif ($news_type->type == 'unactive') {
            if ($this->news_model->update(array('type' => 'active'), array('id' => $data['id']))){
                echo json_encode(array("status" => "active"));
            }else{       
                echo json_encode(array("status" => FALSE));
            }
        } else{
            echo json_encode(array("status" => FALSE));
        }
    }

    /*
     */
    
    private function news_check_redirect_previous($data)
    {
        if ($data->type == "draft") {
            $this->go("news/draft");
        }elseif($data->type == "archive"){
            $this->go('news/archive');
        }else{
            $this->go('news');
        }
    }

    /**
     * @param $config
     *
     * @return mixed
     */
    private function config_for_bootstrap_pagination($config)
    {
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = $this->lang->line('pagination_first_link');
        $config['last_link'] = $this->lang->line('pagination_last_link');
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev_link');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next_link');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }
}
