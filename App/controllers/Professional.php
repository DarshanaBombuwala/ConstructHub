<?php

// require "../App/views/Homepage_view.php";

class Professional extends Main_controller
{
    public function index()
    {


        if (!Auth::logged_in() || !Auth::is_professional()) {
            redirect('homepage');
        }

        $this->view('professional/Dashboard');
    }

    public function leaves($action = null, $id = null)
    {

        if (!Auth::logged_in() || !Auth::is_professional()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $leave = new Leave();



        if ($action == 'add') {

            $leave = new Leave();

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

                if ($leave->validate($_POST)) {
                    //show($_FILES);die;
                    $_POST['date'] = date("Y-m-d H:m:s");
                    $_POST['userid'] =$uid= $_SESSION['USER_DATA']->id;


                    $allowed = ['image/jpeg', 'image/png'];

                    //show($_FILES);die;

                    if (!empty($_FILES['image']['name'])) {
                        if ($_FILES['image']['error'] == 0) {
                            if (in_array($_FILES['image']['type'], $allowed)) {

                                $destination = $folder . time() . $_FILES['image']['name'];

                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                                $_POST['image'] = $destination;
                            } else {
                                $leave->errors['image'] = "This file type not allowed";
                            }
                        } else {
                            $leave->errors['image'] = "Could not upload image";
                        }
                    }

                    $leave->insert($_POST);
                    redirect('professional/Leaves');
                }

                $data['errors'] = $leave->errors;
            }
        } elseif ($action == 'edit') {
            $data['row'] = $row = $leave->first(['id'=>$id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            
                $leave->update($id,$_POST);
                redirect('professional/Leaves');
            }
            
        } elseif ($action == 'delete') {
            $leave->delete($id);
            redirect('professional/Leaves');
            
        } else {
            $_POST['userid'] =$uid= $_SESSION['USER_DATA']->id;
            $passed['userid'] = $uid;
            $data['rows'] = $leave->where($passed);
        }

        $this->view('professional/Leaves', $data);
    }
   
}
