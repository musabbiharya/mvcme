<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Spkl extends Backend{
    protected $module_name='spkl';
    protected $_title='Manage Overtime';
            function __construct() {
        parent::__construct();
        $this->loadCustomModel('employee', 'employee');
    }
    
    public function Index() {
        $this->view->employee = $this->employee_model->get();
        parent::Index();
        
    }
    
    
    
}