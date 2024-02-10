<!-- load every other file in core here -->
<?php

spl_autoload_register(function($class_name){
    require "../App/models/" .$class_name. "s" . ".php";
});
    

require "config.php";
require "functions.php";
require "Database.php";
require "Main_model.php";
require "Main_controller.php";
require "App.php";
require "formModel.php";


?>