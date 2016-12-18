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

    public function index()
    {
        
    }
}
