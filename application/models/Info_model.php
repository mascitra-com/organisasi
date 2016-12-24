<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends MY_Model
{
    public $primary_key = 'no';
    public $fillable = array('website_name','acronym','description','office_address','phone','phone_alt','email','postal_code','logo_link');
    public $protected = array('no');

    public $rules = array(
        'insert' => array(
            'website_name' => array(
                'field' => 'website_name',
                'label' => 'Nama Website',
                'rules' => 'trim|required|min_length[3]|max_length[100]'),
            'acronym' => array(
                'field' => 'acronym',
                'label' => 'Akronim Webiste',
                'rules' => 'trim|required|min_length[3]|max_length[255]'),
            'description' => array(
                'field' => 'description',
                'label' => 'Deskripsi Website',
                'rules' => 'trim|required'),
            'office_address' => array(
                'field' => 'office_address',
                'label' => 'Alamat Kantor',
                'rules' => 'trim|required'),
            'phone' => array(
                'field' => 'phone',
                'label' => 'Telpon',
                'rules' => 'trim|alpha_dash|required'),
            'phone_alt' => array(
                'field' => 'phone_alt',
                'label' => 'Telpon (alternatif)',
                'rules' => 'trim|alpha_dash'),
            'email' => array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|required'),
            'postal_code' => array(
                'field' => 'postal_code',
                'label' => 'Kode Pos',
                'rules' => 'trim|alpha_numeric|required'),
            ),
        'update' => array(
            'website_name' => array(
                'field' => 'website_name',
                'label' => 'Nama Website',
                'rules' => 'trim|required|min_length[3]|max_length[100]'),
            'acronym' => array(
                'field' => 'acronym',
                'label' => 'Akronim Webiste',
                'rules' => 'trim|required|min_length[3]|max_length[255]'),
            'description' => array(
                'field' => 'description',
                'label' => 'Deskripsi Website',
                'rules' => 'trim|required'),
            'office_address' => array(
                'field' => 'office_address',
                'label' => 'Alamat Kantor',
                'rules' => 'trim|required'),
            'phone' => array(
                'field' => 'phone',
                'label' => 'Telpon',
                'rules' => 'trim|alpha_dash|required'),
            'phone_alt' => array(
                'field' => 'phone_alt',
                'label' => 'Telpon (alternatif)',
                'rules' => 'trim|alpha_dash'),
            'email' => array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|required'),
            'postal_code' => array(
                'field' => 'postal_code',
                'label' => 'Kode Pos',
                'rules' => 'trim|alpha_numeric|required'),
            ),
        );

    public function __construct()
    {
        parent::__construct();
    }

    /*
     */
    public function info_already_exist(){
        if ($this->get()) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
