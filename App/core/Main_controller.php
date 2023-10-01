<?php 

class Main_controller {
    
    // fetch required controller page.
    public function load_view(){
        $view = split_path()[0];
        $operation = split_path()[1] ?? "";
        $view_page =  "../App/views/".ucfirst($view)."_view.php";
        if (file_exists($view_page)){
            require $view_page;
        }
        else{
            $view_page =  "../App/views/".ucfirst($view)."/".ucfirst($view)."_view".ucfirst($operation).".php";
            if (file_exists($view_page)){
                include $view_page;
            }
            else{
                $view_page = "../App/views/Error_controller_view.php";
                include $view_page;
            }  
        }
    }

}

// product/add
// product/delete
// $view_page =  "../App/views/".ucfirst($view)."_view.php";