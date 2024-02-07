<?php

// require "../App/views/Homepage_view.php";

class Signup extends Main_controller
{
    public function index()
    {

        $data['errors'] = [];

        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
              $_POST['role'] = 'user';
            if ($user->validate($_POST)) {
                
                $_POST['date'] = date("Y-m-d H:m:s");
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->insert($_POST);
                $_SESSION['new_user'] = $_POST['firstname'];
                message("Your profile was successfully created ");
                redirect('Signin');
            }
        }
        $data['errors'] = $user->errors;
        
        $this->view('Signup', $data);
    }
}
