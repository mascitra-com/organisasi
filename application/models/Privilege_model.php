<?php
/**
 * Andre Hardika
 * Web Developer, Front-End & Graphic Designer
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Privilege_model extends MY_Model
{
	public $primary_key = 'no';
    public function __construct()
    {
    	$this->has_many['menus'] = array('menu_model', 'id_menu', 'created_by');
        parent::__construct();
    }

}
