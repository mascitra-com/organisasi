<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/dashboard/index';
        $this->_view['css']      = 'news';
        $this->_view['js']       = 'news';
        $this->load->model('news_model');
    }

    public function index()
    {
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/index';
        ($this->_data['articles'] = $this->news_model->where('type', 'active')->where('type', '=' ,'unactive', TRUE)->order_by('published_at','asc')->with_user('fields:first_name,last_name')->get_all());
        $this->init();
    }

    public function draft()
    {
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/draft';
        $this->_data['articles'] = $this->news_model->where('type', 'draft')->with_user('fields:first_name,last_name')->get_all();
        $this->init();
    }

    public function archive()
    {
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/archive';
        $this->_data['articles'] = $this->news_model->where('type', 'archive')->with_user('fields:first_name,last_name')->get_all();
        $this->init();
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
        $data['published_at'] = date('Y-m-d', strtotime($data['published_at']));

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

        $data['slug'] = url_title($data['name'], 'dash', TRUE);

        if (!empty($data['img'])) {
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

        if ($this->news_model->insert($data)) {
            if ($data['type'] == 'draft') {
                $this->message('<strong>Berhasil</strong> Berita Disimpan di Draft', 'success');
                redirect('news/draft');
            }else{
                $this->message('<strong>Berhasil</strong> menyimpan Berita Baru', 'success');
                redirect('news');
            }
        } else {
            $this->message('<strong>Gagal</strong> menyimpan Berita Baru', 'danger');
            redirect('news');
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
            
            $update_data['slug'] = url_title($update_data['name'], 'dash', TRUE);
            if ($this->news_model->update($update_data, $id)) {
                $this->message('<strong>Berhasil</strong> mengedit Berita', 'success');
                $this->news_check_redirect_previous($former_news_type);
            } else {
                $this->message('<strong>Gagal</strong> mengedit Berita', 'danger');
                $this->news_check_redirect_previous($former_news_type);
            }
        }else{
            $this->message('<strong>Gagal</strong> Berita tidak ditemukan', 'danger');
            $this->news_check_redirect_previous($former_news_type);
        }
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
}
