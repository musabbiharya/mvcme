<?php

require 'config.php';
require 'util/Auth.php';
date_default_timezone_set('Asia/Jakarta');
function __autoload($class) {
    require LIBS . $class .".php";
}

error_reporting(1);
        ini_set('display_errors', 'on');

$bootstrap = new Bootstrap();

$bootstrap->init();