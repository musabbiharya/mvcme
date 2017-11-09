<?php

class Dashboard extends Backend {

    protected $module_name = 'dashboard';
    protected $_title = 'Dashboard';

    function __construct() {
        parent::__construct();

        $this->view->js = array('dashboard/js/default.js');
    }

    function index() {
        $this->view->title = 'Dashboard';
        $this->view->msg = 'Welcome ' . $this->view->nameuser;

        $this->rendering('index');
    }

    function logout() {
        Session::destroy();
        header('location: ' . URL . 'login');
        exit;
    }

}
