<?php

/*
 * mymvc ;
 * news.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 9:58:07 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Empsalary extends Backend {

    protected $module_name = 'empsalary';
    protected $_title = 'Employe Salary';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('project', 'project');
        $this->loadCustomModel('items', 'items');
    }

    public function Index($period=null) {
        if (isset($period)){
        $result['data'] = $this->model->getPeriod($period);
        $this->view->period = $period;
        
        }
        
        $this->view->js = array('js/index.js');
        $this->view->data = $result;
        $this->view->title = $this->_title;
        $this->rendering('index');
    }

    public function detail($id=null,$empid=null,$name=null) {
        $result['data'] = $this->model->getDetail($id);
        $this->view->js = array('js/detail.js');
        $this->view->data = $result;
        $this->view->title = 'Detail Salary';
        $this->view->empid = $empid;
        $this->view->empname = $name;
        $this->rendering('detail');
        
    }

}
