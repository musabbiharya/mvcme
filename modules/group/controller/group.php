<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Group extends Backend{
    protected $module_name='group';
    protected $_title='Manage Group';
            function __construct() {
        parent::__construct();
         $this->loadCustomModel('page','page');
    }
    public function Index() {
       $datamentah = $this->model->get();
       
       $i=0;
       foreach ($datamentah as $value) {
           $datamentah[$i]['rolenya']=$this->model->getRole($value['id']);
           $i++;
       }
        $result['data'] = $datamentah;
        
         $this->view->js = array('js/index.js');
         $this->view->data = $result;
         $this->view->title = $this->_title;
         $this->rendering('index');
    }
    
    public function edit($id) {
        $this->view->datapage = $this->page_model->get();
        parent::edit($id);
        
    }
    public function add() {
        $this->view->datapage = $this->page_model->get();
        parent::add();
        
    }
    public function save($id) {
        $data = filter_input_array(INPUT_POST);
        $role = implode('|', $data['role']);
        $data['role']=$role;
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