<?php

// require "../App/views/Homepage_view.php";

class Error_controller extends Main_controller{
    public function index(){
        show("error - 404");
    }
}

$view = new Error_controller;
$view->index();
$view->load_view();