<?php

require __DIR__."/autoload.php";
$cntr = isset($_GET['cntr']) ? $_GET['cntr'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';



$controller = 'Controllers' . $cntr;
$cl = new $controller;

$action = 'action' . $act;

$cl->$action();

