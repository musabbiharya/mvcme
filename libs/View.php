<?php

class View {

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $noInclude = false)
    {
        require 'views/' . $name . '.php';    
    }
    public function renderModule($moduleName,$name, $noInclude = false)
    {
        
        require 'modules/'.$moduleName.'/view/' . $name . '.php';
       
    }

}