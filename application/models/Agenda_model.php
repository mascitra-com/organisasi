<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
    }

}
