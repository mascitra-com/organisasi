<?php
/**
 * Andre Hardika
 * Web Developer, Front-End & Graphic Designer
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends MY_Model
{

	public $primary_key = 'id';
    public $fillable = array('nama_menu','link','deskripsi_menu');
    public $protected = array('id');

	public $rules = array(
        'insert' => array(
            'nama_menu' => array(
                'field' => 'nama_menu',
                'label' => 'Nama Menu',
                'rules' => 'trim|required|min_length[3]|max_length[255]'),
            'link' => array(
                'field' => 'link',
                'label' => 'Link Menu',
                'rules' => 'trim|required|min_length[3]|max_length[255]'),
            'deskripsi_menu' => array(
                'field' => 'deskripsi_menu',
                'label' => 'Deskripsi Menu',
                'rules' => 'trim|required')
        ),
        'update' => array(
            'nama_menu' => array(
                'field' => 'nama_menu',
                'label' => 'Nama Menu',
                'rules' => 'trim|required|min_length[3]|max_length[255]'),
            'link' => array(
                'field' => 'link',
                'label' => 'Link Menu',
                'rules' => 'trim|required|min_length[3]|max_length[255]'),
            'deskripsi_menu' => array(
                'field' => 'deskripsi_menu',
                'label' => 'Deskripsi Menu',
                'rules' => 'trim|required')
        )
    );

    public function __construct()
    {
        parent::__construct();
    }

}
