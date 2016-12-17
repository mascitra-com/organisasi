<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Category for Gallery
 */
class Category extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_view['template'] = 'template/dashboard/index';

    }

    public function index()
    {
        $this->init();
    }

    public function create()
    {
        
    }
    
    public function store()
    {
        
    }
    
    public function show($id = NULL)
    {
        
    }
        
    public function edit($id = NULL)
    {
        
    }
    
    public function update($id = NULL)
    {
        
    }
    
    public function destroy($id = NULL)
    {
        
    }
}
