<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends MY_Model
{
    public $primary_key = 'id';
    public $fillable = array('name','body','agenda_date');
    public $protected = array('no');

    public $rules = array(
        'insert' => array(
            'name' => array(
                'field' => 'name',
                'label' => 'Nama Agenda',
                'rules' => 'trim|required|min_length[3]|max_length[100]'),
            'body' => array(
                'field' => 'body',
                'label' => 'Isi Agenda',
                'rules' => 'trim|required'),
            'agenda_date' => array(
                'field' => 'agenda_date',
                'label' => 'Tanggal Agenda',
                'rules' => 'trim|required')
            ),
        'update' => array(
            'name' => array(
                'field' => 'name',
                'label' => 'Nama Agenda',
                'rules' => 'trim|required|min_length[3]|max_length[100]'),
            'body' => array(
                'field' => 'body',
                'label' => 'Isi Agenda',
                'rules' => 'trim|required'),
            'agenda_date' => array(
                'field' => 'agenda_date',
                'label' => 'Tanggal Agenda',
                'rules' => 'trim|required')
            )
        );

    public function __construct()
    {
        parent::__construct();
    }

    public function count_all($search)
    {
        $this->db->select('id');
        $this->search($search);
        return $this->db->get($this->table)->num_rows();
    }

    public function get_latest($limit, $start, $search)
    {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        $this->search($search);
        $this->order_by('agenda_date','DESC');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'Tidak ada agenda';
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
