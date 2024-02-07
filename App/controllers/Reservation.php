<?php

// require "../App/views/Homepage_view.php";

class Reservation extends Main_controller
{
    public function index()
    {


         $data['reservation_details'] = $_POST;
        $this->view('reservationDetailsNew', $data);
    }
}