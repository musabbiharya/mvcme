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
class Cutiemp extends Backend {

    protected $module_name = 'cutiemp';
    protected $_title = 'leave application';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('group', 'group');
        $this->loadCustomModel('absen', 'absen');
        $this->loadCustomModel('cuti', 'cuti');
    }

    public function Index() {
        
            $result['data']['pribadi'] = $this->cuti_model->get($this->id);
            $this->view->js = array('js/index.js');
            $this->view->data = $result;
            $this->view->title = $this->_title;
            $this->rendering('pribadi');
        
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

}
