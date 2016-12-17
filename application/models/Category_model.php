<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
{
    public static $primary_key = 'id';
    public static $table = 'gallery_categories';

    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
    }

}
