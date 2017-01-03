<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends MY_Model
{
    public $table = 'visitors'; // you MUST mention the table name

    public function __construct()
    {
        $this->timestamps = FALSE;
        parent::__construct();
    }

    public function total_visitor()
    {
        $this->db->select('SUM(total) as totalvisitor');
        $results = $this->db->get('visitors')->result();
        if($results[0]->totalvisitor){
            return $results[0]->totalvisitor;
        } else {
            return 0;
        }
    }
}
