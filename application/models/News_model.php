<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends MY_Model
{

    public function __construct()
    {
        $this->has_one['user'] = array('user_model', 'id', 'created_by');
        parent::__construct();
    }

}
