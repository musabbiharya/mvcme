<?php

/*
 * report.php
 * Satria Persada <triasada@yahoo.com> 
 * 8:38:59 PM
 * office 
 */
class Report extends Controller {
    protected $module_name = 'report';
    protected $_title = 'Report';

    function __construct() {
        parent::__construct();
        
    }
    public function Index() {
//         $result['data'] = $this->model->get();
//         $this->view->js = array('js/index.js');
//         $this->view->data = $result;
         $this->view->title = $this->_title;
         $this->rendering('index');
        
    }
    public function rendering($name){
        $this->view->activeMenu=$this->module_name;
        $this->view->renderModule($this->module_name,$name);
    }
}