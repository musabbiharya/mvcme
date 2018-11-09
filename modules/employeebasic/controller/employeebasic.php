<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Employeebasic extends Backend{
    protected $module_name='employeebasic';
    protected $_title='Employee Salary Base';
            function __construct() {
        parent::__construct();
         $this->loadCustomModel('employee', 'employee');
    }
    public function Index() {
        parent::Index();
        
    }
    public function edit($id) {
       $this->view->parent = $this->employee_model->get();
//        $this->view->order = $this->model->getLastOrder();
        parent::edit($id);
    }

    public function add() {
        $this->view->parent = $this->employee_model->get();
//        $this->view->order = $this->model->getLastOrder();
        parent::add();
    }
    public function save($id=null) {
        $data = filter_input_array(INPUT_POST);
        
        $result = (isset($id)) ? $this->model->edit($data,$id) : $this->model->add($data);
//        var_dump($result);die;
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
//        var_dump($data);
    }
    
    
    
}