<?php

/*
* mvc ;
* menu.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 4, 2017;
* 11:16:34 PM;
* Jakarta International Container Terminal (JICT);
*/
class Menu extends Backend{
    function __construct() {
        parent::__construct();
    }
    public function Index() {
         $this->view->menuList = $this->model->getMenu();
         $this->view->title = 'Manage Menu';
         $this->rendering('menu', 'index');
        
    }
    
}