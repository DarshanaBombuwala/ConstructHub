<?php

// require "../App/views/Homepage_view.php";

class Homepage extends Main_controller{
    public function index(){
        show("Hello welocome to the homepage of the website - homepage controller");
    }
}

$view = new Homepage;
$view->index();
$view->load_view();