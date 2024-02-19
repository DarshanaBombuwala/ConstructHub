<?php

// require "../App/views/Homepage_view.php";

class Rentalmanager extends Main_controller
{
    public function index()
    {


        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }

        $this->view('rentalmanager/DashboardNew');
    }

    public function equipments($action = null, $id = null)
    {

        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $equipment = new Equipment();




        if ($action == 'add') {


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
        } elseif ($action == 'edit') {
            $data['row'] = $row = $equipment->first(['id' => $id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {

                $equipment->update($id, $_POST);
                redirect('rentalmanager/Equipments');
            }
        } elseif ($action == 'delete') {
            $equipment->delete($id);
            redirect('rentalmanager/Equipments');
        } else {
            $data['rows'] = $equipment->findAll('asc', 'equipmentId');
        }

        $this->view('rentalmanager/equipmentsNew');
    }
    public function equipmentListing($action = null, $id = null)
    {

        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        $listing = new equipmentListing();


        //show($_POST);
        if ($action == 'add') {


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

                if ($listing->validate($_POST)) {
                    //echo("here");
                    $listing->insert($_POST);
                    //echo("here44");
                   // $new = $listing->latest();
                    // show($new);
                   // echo json_encode($new);
                }

                $data['errors'] = $listing->errors;
            }
        } elseif ($action == 'edit') {
        } elseif ($action == 'delete') {
            $listing->delete($id);
            redirect('rentalmanager/Equipmentlisting');
        } else {
            $data['rows'] = $listing->findAll('asc', 'equipmentTypeId');
            $category= new Create('equipmentCategory',[]);
            $data['category']=$category->findAll('asc','equipmentCategoryId');
            $this->view('rentalmanager/EquipmentlistingNew', $data);
        }
    }

    public function equipmentsnew($action = null, $id = null)
    {

        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $equipment = new Equipment;



        if ($action == 'add') {


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //show($_FILES);die;
               // $folder = "uploads/images/";

                /*if(!file_exists($folder)){
                echo "hello";die;
                mkdir($folder,0777,true);
                file_put_contents($folder."index.php","<?php //silence");
                file_put_contents("uploads/index.php","<?php //silence");
            }*/


                //$data['rows'] = $user->findAll();

                if ($equipment->validate($_POST)) {
                    //echo("here");
                   $equipment->insert($_POST);
                    //echo("here44");
                    
                  // show($new);
                    //echo json_encode('hello');
                    
                    //echo json_encode(['message' => $_POST]);
                }
              // echo json_encode($equipment->validate($_POST)) ;
               // $equipment->insert($_POST);
              //  echo json_encode(['message' => $_POST]);
                //$data['errors'] = $equipment->errors;
            }
        } elseif ($action == 'edit') {
            $data['row'] = $row = $equipment->first(['id' => $id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {

                $equipment->update($id, $_POST);
                redirect('rentalmanager/Equipments');
            }
        } elseif ($action == 'delete') {
            $equipment->delete($id);
            redirect('rentalmanager/Equipments');
        } else {
            $equipmentlisting = new Equipmentlisting;
            $data['category'] = $equipmentlisting->getColumns();
            $this->view('rentalmanager/equipmentsnew', $data);
        }
    }

    public function category($action=null,$id=null){
        if (!Auth::logged_in() || !Auth::is_rmanager()) {
            redirect('homepage');
        }
        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        if($action=='create'){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $newCategory= [
                    'table' => 'equipmentCategory',
                    'allowedColumns' => ['availability', 'categoryName'],
                ];
                $category = new Create($newCategory['table'],$newCategory['allowedColumns']);
                $category->insert($_POST);
                $this->view('rentalmanager/EquipmentCategory');

            }else{
                $this->view('rentalmanager/CategoryForm');
            }
            
            
        }else if($action=="edit"){

        }else if($action=="delete"){

        }else{
            $this->view('rentalmanager/EquipmentCategory');
        }


    }
}
