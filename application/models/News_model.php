<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends MY_Model
{
	public $primary_key = 'id';
    public $fillable = array('name','body');
    public $protected = array('id');

	public $rules = array(
        'insert' => array(
            'name' => array(
                'field' => 'name',
                'label' => 'Nama Agenda',
                'rules' => 'trim|required|min_length[3]|max_length[100]'),
            'body' => array(
                'field' => 'body',
                'label' => 'Isi Agenda',
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
                'rules' => 'trim|required')
        )
    );

    public function __construct()
    {
        $this->has_one['user'] = array('user_model', 'id', 'created_by');
        parent::__construct();
    }

}
