<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Employee extends Backend{
    protected $module_name='employee';
    protected $_title='Manage Employee';
            function __construct() {
        parent::__construct();
         $this->loadCustomModel('group', 'group');
         $this->loadCustomModel('sites', 'sites');
    }
    public function Index() {
         $result['data'] = $this->model->get();
         foreach ($result['data'] as $key => $value) {
             $result['data'][$key]['groupName']= $this->group_model->get($value['groupID'])[0]['groupName'];
             $result['data'][$key]['parent']= $this->model->get($value['parent'])[0]['fullName'];
             $result['data'][$key]['place']= $this->sites_model->get($value['sitesid'])[0]['name'];
             
             
         }
         $this->view->js = array('js/index.js');
         $this->view->data = $result;
         $this->view->title = $this->_title;
         $this->rendering('index');
        
    }
    public function edit($id) {
        $this->view->parent = $this->model->getParent();
        $this->view->position = $this->group_model->get();
        $this->view->place = $this->sites_model->get();
//        $this->view->order = $this->model->getLastOrder();
        parent::edit($id);
    }

    public function add() {
        $this->view->parent = $this->model->getParent();
        $this->view->position = $this->group_model->get();
        $this->view->place = $this->sites_model->get();
//        $this->view->order = $this->model->getLastOrder();
        parent::add();
    }
    public function save($id=null) {
        $data = filter_input_array(INPUT_POST);
        $data['createdby']=$this->id;
        
        $result = (isset($id)) ? $this->model->edit($data,$id) : $this->model->add($data);
//        var_dump($result);die;
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
//        var_dump($data);
    }
    
    
    
}