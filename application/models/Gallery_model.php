<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends MY_Model
{
    public $primary_key = 'id';

    public function __construct()
    {
        $this->has_one['category'] = array('category_model','id','category_id');
        parent::__construct();
    }

    public function fetch_data($limit, $start, $galleries_id)
    {
        $this->db->limit($limit, $start);
        $this->db->where('category_id', $galleries_id);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak Ditemukan Foto Pada Galeri Ini';
    }

    public function fetch_videos($limit, $start, $search)
    {
        $this->db->limit($limit, $start);
        $this->db->where('type_id', 2);
        $this->search($search);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak Ditemukan Video';
    }

    public function count_videos($search)
    {
        $this->db->select('id');
        $this->search($search);
        $this->db->where('type_id', 2);
        return $this->db->get($this->table)->num_rows();
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
