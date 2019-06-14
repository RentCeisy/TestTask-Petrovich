<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class) . '.php';
    if(file_exists($class)) {
        require $class;
    }
});

if(file_exists('view.php')) {
    require_once 'view.php';
}

