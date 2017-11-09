<?php

/*
 * mvc ;
 * menu.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2017;
 * 11:16:34 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Menu extends Backend {

    protected $module_name = 'menu';
    protected $_title = 'Manage menu';

    function __construct() {
        parent::__construct();
    }
    public function edit($id) {
        $this->view->parent = $this->model->getParent();
        parent::edit($id);
    }

    public function add() {
        $this->view->parent = $this->model->getParent();
        $this->view->order = $this->model->getLastOrder()[0];
        parent::add();
    }

}
