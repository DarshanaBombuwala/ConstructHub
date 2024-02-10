<?php

// require "../App/views/Homepage_view.php";

class Logout extends Main_controller
{
    public function index()
    {
        Auth::logout();
        redirect('Homepage');
    }
}
