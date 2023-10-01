<?php

function show($_value){
    echo("<pre>");
    print_r($_value);
    echo("</pre>");
};

function split_path(){
    $said_path = ($_GET["typedThing"]) ?? "HomePage";
    $path_arr = explode("/", $said_path);
    // show($path_arr);
    return $path_arr;
}
