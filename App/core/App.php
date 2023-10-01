<?php

class App {
    
    // fetch required controller page.
    public function load_controller(){
        show(split_path());
        $controller = split_path()[0];
        $controller_page =  "../App/controllers/".ucfirst($controller).".php";
        if (file_exists($controller_page)){
            require $controller_page;
        }
        else{
            $controller_page = "../App/controllers/Error_controller.php";
            require $controller_page;
        }
    }

}