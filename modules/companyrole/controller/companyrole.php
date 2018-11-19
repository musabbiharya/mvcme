<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class Companyrole extends Backend{
    protected $module_name='companyrole';
    protected $_title='Manage Company Role';
            function __construct() {
        parent::__construct();
         $this->loadCustomModel('group', 'group');
         $this->loadCustomModel('sites', 'sites');
    }
    
    
    
}