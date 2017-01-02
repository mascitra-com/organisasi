<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Regulation_model extends MY_Model
{

    public function __construct()
    {
        $this->soft_deletes = TRUE;
        parent::__construct();
    }

    public function fetch_data($limit, $start, $search)
    {
        $this->db->limit($limit, $start);
        $this->search($search);
        $this->db->order_by('issued_at', 'desc');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak ditemukan data Regulasi';
    }

    /**
     * @param $search
     */
    private function search($search)
    {
        $this->db->where('deleted_at', NULL);
        if (isset($search)) {
            $col = $this->db->list_fields($this->table);
            $i = 1;
            foreach ($search as $val) {
                if (!empty($val)) {
                    $this->db->like($col[$i], $val);
                }
                $i++;
            }
        }
    }

    public function count_data($search)
    {
        $this->db->select('id');
        $this->search($search);
        return $this->db->get($this->table)->num_rows();
    }
}
