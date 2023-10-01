<?php
require "../App/models/Leaves.php";
class Leave extends Main_controller{

    public function index(){
        show("Hello welocome to the Leave page of the website - leave controller\n");
    }
    public function add(){
        show("Add a new leave ");
        show($_POST);
        $leave = new Leaves;
        $leave->add($_POST);

        echo '<script type="text/JavaScript"> 
        alert("leave is requested");
        window.location.href = "http://localhost/MVC/Public/Leave/retrieve";
        </script>';
       
    }

    public function retrieve(){
        $leave = new Leaves;
        $where = [
            "emp_id" => "e_c02", 
            ];
        $columns = ["requested_date", "reason"];
        $result = $leave->retrieve($columns, $where);
        return array_values($result);
       
    }
}

$view = new Leave;

show($_SERVER["REQUEST_METHOD"] );

$op = split_path()[1] ?? "index";
if ($op == "add"){
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $view->load_view();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $operation_func = call_user_func_array([$view, $op], []);
    }
}
else if ($op == "retrieve"){
    $str_data = call_user_func_array([$view, $op], []);
    include "../App/views/Leave/Leave_viewRetrieve.php";
    //$view->load_view();
}
else{
    $view->load_view();
}

