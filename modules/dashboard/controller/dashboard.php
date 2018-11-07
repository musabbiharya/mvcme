<?php

class Dashboard extends Backend {

    protected $module_name = 'dashboard';
    protected $_title = 'Dashboard';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('group', 'group');
        $this->loadCustomModel('absen', 'absen');
    }

    function index() {
        $this->view->title = 'Dashboard';
        $this->view->msg = 'Welcome ' . $this->view->nameuser;
        if (!isset($date)) {
            $date = date("Y-m");
        }
        $dataAbsen = $this->absen_model->getAbsenEmp($this->id,$date);
//        $dataAbsen = $this->absen_model->getAbsenEmp('2018111011', $date);

        $this->view->data = $dataAbsen;
        $this->view->date = $date;
        $this->view->js = array('js/index.js');
        $this->rendering('index');
    }

    function logout() {
        Session::destroy();
        header('location: ' . URL . 'login');
        exit;
    }

}
