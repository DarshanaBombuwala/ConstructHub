<?php

// require "../App/views/Homepage_view.php";

class Rentalmanager extends Main_controller
{
    public function index()
    {


        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }

        $this->view('rentalmanager/Dashboard');
    }

    public function equipments($action=null,$id=null)
    {

        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $equipment = new Equipment();
        


        if($action=='add'){
            

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

            if ($equipment->validate($_POST)) {
                //show($_FILES);die;
                $_POST['date'] = date("Y-m-d H:m:s");
                

                $allowed = ['image/jpeg', 'image/png'];

                //show($_FILES);die;

                if (!empty($_FILES['image']['name'])) {
                    if ($_FILES['image']['error'] == 0) {
                        if (in_array($_FILES['image']['type'], $allowed)) {

                            $destination = $folder . time() . $_FILES['image']['name'];

                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                            $_POST['image'] = $destination;
                        } else {
                            $equipment->errors['image'] = "This file type not allowed";
                        }
                    } else {
                        $equipment->errors['image'] = "Could not upload image";
                    }
                }

                $equipment->insert($_POST);
                redirect('rentalmanager/Equipments');
            }

            $data['errors'] = $equipment->errors;


        }
        }elseif($action=='edit'){
            $data['row'] = $row = $equipment->first(['id'=>$id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            
                $equipment->update($id,$_POST);
                redirect('rentalmanager/Equipments');
            }
            
        }
        elseif($action=='delete'){
            $equipment->delete($id);
            redirect('rentalmanager/Equipments');
        }
        else{
            $data['rows'] = $equipment->findAll('asc');
        }

        $this->view('rentalmanager/Equipments',$data);
    }
    public function equipmentlisting($action=null,$id=null)
    {

        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        
        


        if($action=='add'){
            

        }elseif($action=='edit'){
           
            
        }
        elseif($action=='delete'){
            
        }
        else{
            
        }

        $this->view('rentalmanager/Equipmentlisting',$data);
    }

    
}
