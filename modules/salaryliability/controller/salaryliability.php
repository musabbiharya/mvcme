<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Salaryliability extends Backend{
    protected $module_name='salaryliability';
    protected $_title='Salary liability';
            function __construct() {
        parent::__construct();
        
    }
    
    
    public function save($id=null) {
        $data = filter_input_array(INPUT_POST);
        $data['createdby']=$this->id;
         $data['paidby']=1;
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