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
