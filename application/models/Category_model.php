<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
{
    public $table = 'gallery_categories'; // you MUST mention the table name

    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_data($limit, $start, $search)
    {
        $this->db->limit($limit, $start);
        $this->search($search);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak ditemukan Galeri Foto';
    }

    public function count_data($search)
    {
        $this->db->select('id');
        $this->search($search);
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
