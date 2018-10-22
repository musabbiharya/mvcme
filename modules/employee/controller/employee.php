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
    }
    public function Index() {
         $result['data'] = $this->model->get();
         foreach ($result['data'] as $key => $value) {
             $result['data'][$key]['groupName']= $this->group_model->get($value['groupID'])[0]['groupName'];
             
             
         }
         $this->view->js = array('js/index.js');
         $this->view->data = $result;
         $this->view->title = $this->_title;
         $this->rendering('index');
        
    }
    public function edit($id) {
        $this->view->parent = $this->model->getParent();
        $this->view->position = $this->group_model->get();
//        $this->view->order = $this->model->getLastOrder();
        parent::edit($id);
    }

    public function add() {
        $this->view->parent = $this->model->getParent();
        $this->view->position = $this->group_model->get();
//        $this->view->order = $this->model->getLastOrder();
        parent::add();
    }
    
    
    
}