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
        $this->_data['news'] = $this->news_model->with_user('fields:first_name,last_name')->get_all();
        $this->init();
    }

    public function draft()
    {
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/draft';
        $this->_data['news'] = $this->news_model->with_user('fields:first_name,last_name')->get_all();
        $this->init();
    }

    public function archive()
    {
        $this->_view['title'] = 'Berita';
        $this->_view['page'] = 'news/archive';
        $this->_data['news'] = $this->news_model->with_user('fields:first_name,last_name')->get_all();
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
        $data = $this->input->post();

        $data['img_name'] = 'test';

        $data['slug'] = url_title($data['name'], 'dash', TRUE);
        
        if (empty($data['type'])) {
            $data['type'] = 'active';
        }

        if ($this->news_model->insert($data)) {
            $this->message('<strong>Berhasil</strong> menyimpan Berita Baru', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menyimpan Berita Baru', 'danger');
        }
        redirect('news');
        // dump($data);
    }

    public function show($id = 1)
    {
        $this->_data['news'] = $this->news_model->with_user('fields:first_name,last_name')->get(array('id' => $id));
        $this->_view['title'] = 'Detail Berita';
        $this->_view['page'] = 'news/detail';
        $this->init();
    }

    public function edit($id = 1)
    {
        $this->_data['news'] = $this->news_model->with_user('fields:first_name,last_name')->get(array('id' => $id));
        $this->_view['title'] = 'Edit Berita';
        $this->_view['page'] = 'news/edit';
        $this->init();
    }
    
    public function update($id = NULL)
    {
        $update_data = $this->input->post();
        $update_id = $update_data['id'];
        unset($update_data['id']);
        if ($this->news_model->update($update_data, $update_id)) {
            $this->message('<strong>Berhasil</strong> mengedit Berita', 'success');
        } else {
            $this->message('<strong>Gagal</strong> mengedit Berita', 'danger');
        }
        redirect('news');
    }

    public function destroy($id)
    {
        if($this->news_model->delete($id)){
            $this->message('<strong>Berhasil</strong> menghapus Berita', 'success');
        } else {
            $this->message('<strong>Gagal</strong> menghapus Berita', 'danger');
        }
        redirect('news');
    }
}
