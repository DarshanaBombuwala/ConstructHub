<?php

// require "../core/Main_model.php";

class Leaves extends Main_model{
    
    public $tablename = "leaves";

}

// $Assarr_1 = [
//     "emp_id" => $_POST["emp_id"],
//     "requested_date" => $_POST["requested_date"],
//     "first_name" => $_POST["first_name"],
//     "last_name" => $_POST["last_name"],
//     "reason" => $_POST["reason"],
// ];
$Assarr_2 = [
    "emp_id" => "e_c02", 
    "requested_date" => "2023-06-17", 
    "first_name" => "sohani", 
    "last_name" => "hemanthi", 
    "reason" => "I have a toothache",
];
$Assarr_3 = [
    "requested_date" => "2023-06-19", 
    "reason" => "I have a cold",
];
$where = [
"emp_id" => "e_c01", 
];
$columns = ["emp_id", "first_name"];

// $leave = new Leaves;
// $leave->add($_POST);
//$leave->add($Assarr_2);
//$leave->retrieve($columns, $where);
//$leave->retrieve($columns);
//$leave->retrieve([], $where);
//$leave->update($Assarr_3, $where);
//$leave->delete($where);