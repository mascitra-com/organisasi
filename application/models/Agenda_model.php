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

}
