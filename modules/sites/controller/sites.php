<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Sites extends Backend{
    protected $module_name='sites';
    protected $_title='Sites';
            function __construct() {
        parent::__construct();
         $this->loadCustomModel('project', 'project');
    }
    public function Index() {
         $result['data'] = $this->model->get();
         foreach ($result['data'] as $key => $value) {
             $result['data'][$key]['project']= $this->project_model->get($value['projectid'])[0]['name'];
         }
         $this->view->js = array('js/index.js');
         $this->view->data = $result;
         $this->view->title = $this->_title;
         $this->rendering('index');
        
    }
    public function edit($id) {
        $this->view->parent = $this->model->getParent();
        parent::edit($id);
    }

    public function add() {
        $this->view->parent = $this->model->getParent();
        parent::add();
    }
    
    
}