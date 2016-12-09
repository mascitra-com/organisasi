<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends MY_Model
{
    public $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
}
