<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends MY_Model
{
	public $primary_key = 'id';
    public $fillable = array('name','body','slug','img_name','img_link','type','published_at','status_headline','count');
    public $protected = array('id');

    public $rules = array(
    	'insert' => array(
    		'name' => array(
    			'field' => 'name',
    			'label' => 'Judul',
    			'rules' => 'trim|required|min_length[3]|max_length[50]'),
    		),
    	'update' => array(
    		'name' => array(
    			'field' => 'name',
    			'label' => 'Judul',
    			'rules' => 'trim|required|min_length[3]|max_length[50]'),
    		)
    	);

    public function __construct()
    {
        $this->has_one['user'] = array('user_model', 'id', 'created_by');
        parent::__construct();
    }

    public function counter($slug)
    {
        return $this->db->query("UPDATE news SET count = count+1 WHERE slug ='$slug'");
    }

    public function count_latest_active_news($search)
    {
        $this->db->select('id');
        $this->db->where('type','active');
        $this->search_homepage($search);
        $this->db->order_by('published_at','DESC');
        return $this->db->get($this->table)->num_rows();
    }

    public function get_latest_active_news($limit, $start, $search)
    {
        $this->db->select('news.*, users.first_name, users.last_name');
        $this->db->join('users', 'users.id = news.created_by');
        $this->db->limit($limit, $start);
        $this->db->where('type','active');
        $this->search_homepage($search);
        $this->order_by('published_at','DESC');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak ada berita';
    }

    public function fetch_data_index($limit, $start, $search)
    {
        $this->db->select('news.*, users.first_name, users.last_name');
        $this->db->join('users', 'users.id = news.created_by');
        if (isset($search)) {
            if ($search->type === "active") {
                $this->db->where('type', 'active');
            }elseif ($search->type === "unactive") {
                $this->db->where('type', 'unactive');
            }else{
                $this->db->where_in('type', array('active', 'unactive'));
            }
        }else{
            $this->db->where_in('type', array('active', 'unactive'));
        }
        $this->db->limit($limit, $start);
        $this->search($search);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Berita tidak ditemukan'; 
    }

    public function fetch_data_draft($limit, $start, $search)
    {
        $this->db->select('news.*, users.first_name, users.last_name');
        $this->db->from('news');
        $this->db->join('users', 'users.id = news.created_by');
        $this->db->where('type', 'draft');
        $this->db->order_by('published_at','desc');
        $this->db->limit($limit, $start);
        $this->search($search);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Berita tidak ditemukan';
    }

    public function fetch_data_archive($limit, $start, $search)
    {
        $this->db->select('news.*, users.first_name, users.last_name');
        $this->db->from('news');
        $this->db->join('users', 'users.id = news.created_by');
        $this->db->where('type', 'archive');
        $this->db->order_by('published_at','desc');
        $this->db->limit($limit, $start);
        $this->search($search);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Berita tidak ditemukan';
    }

    public function count_data_index($search)
    {
        $this->db->select('id');
        if (isset($search)) {
            if ($search->type === "active") {
                $this->db->where('type', 'active');
            }elseif ($search->type === "unactive") {
                $this->db->where('type', 'unactive');
            }else{
                $this->db->where_in('type', array('active', 'unactive'));
            }
        }else{
            $this->db->where_in('type', array('active', 'unactive'));
        }
        $this->search($search);
        return $this->db->get($this->table)->num_rows();
    }

    public function count_data_draft($search)
    {
        $this->db->select('id');
        $this->db->where('type', 'draft');
        $this->search($search);
        return $this->db->get($this->table)->num_rows();
    }

    public function count_data_archive($search)
    {
        $this->db->select('id');
        $this->db->where('type', 'archive');
        $this->search($search);
        return $this->db->get($this->table)->num_rows();
    }

    /**
     * @param $search
     */
    private function search($search)
    {
        if (isset($search)) {
            if ($search->published_at === "newest") {
                $this->db->order_by('published_at','desc');
            }else{
              $this->db->order_by('published_at','asc');
          }
          $this->db->like('name', $search->name);
      }
  }

  private function search_homepage($search)
  {
    if (isset($search)) {
        $col = $this->db->list_fields($this->table);
        $i = 1;
        foreach ($search as $val) {
            if(!empty($val)){
                $this->db->like($col[$i], $val);}
                $i++;
            }
        }
    }
}
