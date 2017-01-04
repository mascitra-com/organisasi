<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement_model extends MY_Model
{
    public $primary_key = 'id';
    public $fillable = array('name','body','expiration_date', 'priority', 'slug');
    public $protected = array('id');

    public $rules = array(
        'insert' => array(
            'name' => array(
                'field' => 'name',
                'label' => 'Judul Pengumuman',
                'rules' => 'trim|required|min_length[3]|max_length[100]'),
            'body' => array(
                'field' => 'body',
                'label' => 'Isi Pengumuman',
                'rules' => 'trim|required'),
            'expiration_date' => array(
                'field' => 'expiration_date',
                'label' => 'Masa Aktif Pengumuman',
                'rules' => 'trim|required'),
            ),
        'update' => array(
            'name' => array(
                'field' => 'name',
                'label' => 'Judul Pengumuman',
                'rules' => 'trim|required|min_length[3]|max_length[100]'),
            'body' => array(
                'field' => 'body',
                'label' => 'Isi Pengumuman',
                'rules' => 'trim|required'),
            'expiration_date' => array(
                'field' => 'expiration_date',
                'label' => 'Masa Aktif Pengumuman',
                'rules' => 'trim|required'),
            )
        );

    public function __construct()
    {
        parent::__construct();
    }

    public function count_data($search)
    {
        $this->db->select('id');
        $this->search($search);
        return $this->db->get($this->table)->num_rows();
    }


    public function fetch_data($limit, $start, $search)
    {
        $this->db->limit($limit, $start);
        if (isset($search)) {
            if ($search->priority === "high") {
                $this->db->where('priority', '1');
            }elseif ($search->priority === "common") {
                $this->db->where('priority', '0');
            }else{
                $this->db->where_in('priority', array('0', '1'));
            }
        }else{
            $this->db->where_in('priority', array('0', '1'));
        }
        $this->search($search);
        $this->order_by('expiration_date','desc');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak ditemukan data Pengumuman';
    }

     /**
     * @param $search
     */
     private function search($search)
     {
      if (isset($search)) {
        if ($search->expiration_date === "newest") {
            $this->db->order_by('expiration_date','desc');
        }else{
          $this->db->order_by('expiration_date','asc');
      }
      $this->db->like('name', $search->name);
      $this->db->like('body', $search->body);
  }
}

}
