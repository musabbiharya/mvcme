<?php

/*
 * mymvc ;
 * news.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 9:58:07 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Spkl extends Backend {

    protected $module_name = 'spkl';
    protected $_title = 'Manage Overtime';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('employee', 'employee');
    }

    public function Index() {
//        $this->view->nganu = $this->employee_model->get();
        parent::Index();
    }

    public function add() {
        $this->view->employee = $this->employee_model->get();
        parent::add();
    }

    public function edit($id) {
        $this->view->employee = $this->employee_model->get();
        $this->view->js = array('js/detail.js');
        $this->view->title = "Edit " . $this->_title;
        $data = $this->model->get($id);
        $datalist = $this->model->getList($id);
        
        $datalist2= array();
        foreach ($datalist as $value) {
            array_push($datalist2, $value['empid']);
        }
        $result['data'] = $data[0];
        $result['data']['list'] = $datalist2;

        $this->view->data = $result;
        $this->rendering('detail');
    }
    public function save($id=null) {
        $data = filter_input_array(INPUT_POST);
//        var_dump($emp);die;
        $data['createdby']=$this->id;
        if (isset($id)){
            $data['id']=$id;
        }
        $result = (isset($id)) ? $this->model->edit($data) : $this->model->add($data);
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
//        var_dump($data);
    }

}
