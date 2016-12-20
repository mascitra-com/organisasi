<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends MY_Model
{
    public $primary_key = 'id';

    public function __construct()
    {
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

    public function fetch_videos($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('type_id', 2);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak Ditemukan Video';
    }
}
