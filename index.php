<?php

require 'config.php';
require 'util/Auth.php';

// Also spl_autoload_register (Take a look at it if you like)
function __autoload($class) {
    require LIBS . $class .".php";
}

error_reporting(1);
        ini_set('display_errors', 'on');
// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();