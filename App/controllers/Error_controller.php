<?php

// require "../App/views/Homepage_view.php";

class Error_controller extends Main_controller{
    public function index(){
        show("error - 404");
        $this->view('Error_controller');
    }
}

