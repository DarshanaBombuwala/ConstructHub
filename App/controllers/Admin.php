<?php

// require "../App/views/Homepage_view.php";

class Admin extends Main_controller
{
    public function index()
    {


        if (!Auth::logged_in() || !Auth::is_admin()) {
            redirect('homepage');
        }

        $this->view('admin/Dashboard');
    }

    public function users($action=null,$id=null)
    {

        if (!Auth::logged_in() || !Auth::is_admin()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $user = new User;
        


        if($action=='add'){
            $user = new User();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //show($_FILES);die;
            $folder = "uploads/images/";

            /*if(!file_exists($folder)){
                echo "hello";die;
                mkdir($folder,0777,true);
                file_put_contents($folder."index.php","<?php //silence");
                file_put_contents("uploads/index.php","<?php //silence");
            }*/


            //$data['rows'] = $user->findAll();

            if ($user->validate($_POST)) {
                //show($_FILES);die;
                $_POST['date'] = date("Y-m-d H:m:s");
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $allowed = ['image/jpeg', 'image/png'];

                //show($_FILES);die;

                if (!empty($_FILES['image']['name'])) {
                    if ($_FILES['image']['error'] == 0) {
                        if (in_array($_FILES['image']['type'], $allowed)) {

                            $destination = $folder . time() . $_FILES['image']['name'];

                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                            $_POST['image'] = $destination;
                        } else {
                            $user->errors['image'] = "This file type not allowed";
                        }
                    } else {
                        $user->errors['image'] = "Could not upload image";
                    }
                }

                $user->insert($_POST);
                redirect('admin/Users');
            }

            $data['errors'] = $user->errors;


        }
        }elseif($action=='edit'){
            $data['row'] = $row = $user->first(['id'=>$id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            
                $user->update($id,$_POST);
                redirect('admin/Users');
            }
            
        }
        elseif($action=='delete'){
            $user->delete($id);
            redirect('admin/Users');
        }
        else{
            $data['rows'] = $user->findAll('asc');
        }

        $this->view('admin/Users',$data);
    }

    
}
