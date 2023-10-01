<?php

session_start();

// load init.php 
require "../App/core/init.php";
show("hello user, ");
$app = new App;
$app->load_controller();


?>


