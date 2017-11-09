<?php

/*
* mvc ;
* backend.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 4, 2017;
* 8:32:45 PM;
* Jakarta International Container Terminal (JICT);
*/
class Backend extends Controller{
    protected $id;
    protected $module_name;
    protected $_title;
            function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->id = $_SESSION['userid'];
//        @session_start();
        $this->view->nameuser=$_SESSION['userProfileName'];
        $this->loadModel('backend');
        $data = $this->model->getCompany();
        $this->view->companyLogo = $data[3]['description'];
        $this->view->companyName = $data[0]['description'];
        
        
    }
    public function Index() {
         $result['data'] = $this->model->get();
         $this->view->js = array('js/index.js');
         $this->view->data = $result;
         $this->view->title = $this->_title;
         $this->rendering('index');
        
    }
    
    public function rendering($name){
        $this->view->activeMenu=$this->module_name;
        $this->view->render('header2');
        $this->view->renderModule($this->module_name,$name);
        $this->view->render('footer2');
    }
    public function del($id) {
        $result = $this->model->del($id);
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
    }
    
    public function add() {
        $this->view->js = array('js/add.js');
        $this->view->title = "Add ".$this->module_name;
        $this->rendering('add');
    }
    public function edit($id) {
        $this->view->js = array('js/edit.js');
        $this->view->title = "Edit ".$this->module_name;
        $data = $this->model->get($id);
        $result['data'] = $data[0];
        $this->view->data = $result;
        $this->rendering('edit');
    }
    public function save($id) {
        $data = filter_input_array(INPUT_POST);
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