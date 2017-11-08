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
    
    public function rendering($module,$name){
        $this->view->activeMenu=$module;
        $this->view->render('header2');
        $this->view->renderModule($module,$name);
        $this->view->render('footer2');
    }
}