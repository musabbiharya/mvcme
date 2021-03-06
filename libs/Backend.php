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
    protected $group;
    protected $module_name;
    protected $inverior;
    protected $_title;
            function __construct() {
        parent::__construct();
        $this->loadModel('backend');
        Auth::handleLogin();
        $this->id = $_SESSION['userid'];
        $this->group = $this->model->getGroup($_SESSION['role'])[0]['groupName'];
        $this->view->userid = $_SESSION['userid'];
//        $this->inverior = $this->model->getInverior('2017080001');
        $this->inverior = $this->model->getInverior($this->id);
//        @session_start();
        $this->view->nameuser=$_SESSION['userProfileName'];
        $data = $this->model->getCompany();
        $this->view->companyLogo = (isset($data[3]['description']))?$data[3]['description']:'';
        $this->view->companyName = (isset($data[0]['description']))?$data[3]['description']:'';
        $this->pageId = $this->model->getPage($this->module_name)[0]['id'];
        $this->view->Navbar = $this->model->getMenu($this->id);
        if (!$this->model->is_privileged($this->id, $this->pageId)) {
            session_destroy();
            header('location:'.URL.'login');
        }
        
        
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
        $this->view->js = array('js/detail.js');
        $this->view->title = "Add ".$this->_title;
        $this->rendering('detail');
    }
    public function edit($id) {
        $this->view->js = array('js/detail.js');
        $this->view->title = "Edit ".$this->_title;
        $data = $this->model->get($id);
        $result['data'] = $data[0];
        $this->view->data = $result;
        $this->rendering('detail');
    }
    public function save($id=null) {
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