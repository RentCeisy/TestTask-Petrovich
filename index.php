<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class) . '.php';
    if(file_exists($class)) {
        require $class;
    }
});

if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
    $db = new \Database\DBHelper();
    $data = $db->checkQueryString($_SERVER['QUERY_STRING']);
    if($data !== false) {
        header("Location: " . $data);
        die();
    }
}

if(file_exists('view.php')) {
    require_once 'view.php';
}

