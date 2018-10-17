<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Project extends Backend{
    protected $module_name='project';
    protected $_title='Manage project';
            function __construct() {
        parent::__construct();
    }
    public function save($id=null) {
        $data = filter_input_array(INPUT_POST);
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