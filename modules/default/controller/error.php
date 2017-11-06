<?php

class Error extends Controller {
    public $msg='';
    function __construct() {
        parent::__construct(); 
    }
    
    function index() {
        $this->view->title = '404 Error';
        $this->view->msg = $this->msg;
        
        $this->view->renderModule('default','inc/header');
        $this->view->renderModule('default','error');
        $this->view->renderModule('default','inc/footer');
    }

}