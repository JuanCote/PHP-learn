<?php

// logs
include_once('core/system.php');

$cname = $_GET['c'] ?? 'index';
$path = "controllers/$cname.php";

if (!checkControllerName($cname) || !file_exists($path)){
  header('HTTP/1.1 404 Not Found');
  $path = "views/errors/v_404.php";
}
// preg_match $cname 

include_once($path);