<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Absen extends Backend{
    protected $module_name='absen';
    protected $_title='GEO absen';
            function __construct() {
        parent::__construct();
         $this->loadCustomModel('group', 'group');
    }
    public function Index() {
         
         $this->view->js = array('js/index.js');
         $this->view->title = $this->_title;
         $this->rendering('index');
        
    }
    
    
    
    
}