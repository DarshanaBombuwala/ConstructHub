<?php

// require "../App/views/Homepage_view.php";

class Signin extends Main_controller
{
    public function index()
    {
        $data['errors'] = [];

        $user =  new User();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $row = $user->first([
                'email' => $_REQUEST['email'],
            ]);



            if ($row) {
                if (password_verify($_POST['password'], $row->password)) {

                    Auth::authenticate($row);
                    redirect('Homepage');
                }
            }

            $data['errors']['email'] = "Wrong email or password";
        }
        $this->view('Signin', $data);
    }
}
