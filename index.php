<?php

use Application\Classes\View;
require __DIR__."/autoload.php";

$path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$pathParts = explode( '/' ,$path);

$cntr = !empty($pathParts['1']) ? ucfirst($pathParts['1']) : 'News';
$act = !empty($pathParts['2']) ? ucfirst($pathParts['2']) : 'All';

$controller = 'Application\Controllers\\' . $cntr;
$cl = new $controller;

$action = 'action' . $act;
try {
    $cl->$action();
}catch (Exception $e){
    $view = new View();
    $view->error  = $e->getMessage();
    $view->display('error.php');

}




