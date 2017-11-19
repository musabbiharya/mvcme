<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Page extends Backend{
    protected $module_name='page';
    protected $_title='Manage page';
            function __construct() {
        parent::__construct();
    }
    public function edit($id) {
        $this->view->parent = $this->model->getParent();
        parent::edit($id);
    }

    public function add() {
        $this->view->parent = $this->model->getParent();
        parent::add();
    }
    
    
    
}