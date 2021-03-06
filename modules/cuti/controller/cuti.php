<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuti
 *
 * @author Satria Persada <triasada@yahoo.com>
 */
class Cuti extends Backend {

    protected $module_name = 'cuti';
    protected $_title = 'Manage Emp leave';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('group', 'group');
        $this->loadCustomModel('absen', 'absen');
    }

    public function Index() {
            $result['data']['atasan'] = $this->model->getAll($this->inverior);
            $this->view->js = array('js/atasan.js');
            $this->view->data = $result;
            $this->view->title = $this->_title;
            $this->rendering('atasan');
        
    }
    public function save($id=null) {
        $data = filter_input_array(INPUT_POST);
        
        $data['createdby']=$this->id;
        $data['empid']=$this->id;
         $data['status']='Applied';
//        var_dump($data);die;
        $result = (isset($id)) ? $this->model->edit($data,$id) : $this->model->add($data);
//        var_dump($result);die;
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
//        var_dump($data);
    }
    function approve($id,$date=null) {
        if (!isset($date)){
            $date = date("Y-m-d", strtotime("-1 days"));
        }
        $result = $this->model->approve($id,$date);
        echo json_encode($result);
        
    }
    function rejected($id,$date=null) {
        if (!isset($date)){
            $date = date("Y-m-d", strtotime("-1 days"));
        }
        $result = $this->model->rejected($id,$date);
        echo json_encode($result);
        
    }

}
