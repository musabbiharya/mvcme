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
        $this->view->js = array('js/edit.js');
        $this->view->title = "Edit Menu";
        $data = $this->model->get($id);
        $result['data'] = $data[0];
        $result['parent'] = $this->model->getParent();
        $this->view->data = $result;
        $this->rendering('edit');
    }

    public function add() {
        $this->view->js = array('js/add.js');
        $this->view->title = "Add Menu";
        $result['parent'] = $this->model->getParent();
        $result['menuOrder'] = $this->model->getLastOrder()[0];
        $this->view->data = $result;
        $this->rendering('add');
    }

}
