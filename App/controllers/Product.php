<?php

class Product extends Main_controller{
    public function index(){
        show("Hello welocome to the product page of the website - product controller\n");
    }
    public function add(){
        show("Add a new product");
    }

}

$view = new Product;
// $view->index();
// call_user_func_array(); - parameter array 
$op = split_path()[1] ?? "index";
$operation_func = call_user_func_array([$view, $op], []);
$view->load_view();
