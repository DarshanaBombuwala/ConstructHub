<?php

if($_SERVER["SERVER_NAME"] == "localhost"){
    if (!defined('my_abs_path')) define('my_abs_path', "http://localhost/MVC/Public/");
  
}
else{
    define("my_abs_path", "http://mywebsite");
}


$host = 'localhost';
$db = 'constructhub';
$user = 'root';
$password = '';
?>

