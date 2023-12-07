<?php

// require "../App/views/Homepage_view.php";

class Companymanager extends Main_controller
{
    public function index()
    {


        if (!Auth::logged_in() || !Auth::is_cmanager()) {
            redirect('homepage');
        }

        $this->view('companymanager/Dashboard');
    }

    public function quotations($action=null,$id=null)
    {
        
        if (!Auth::logged_in() || !Auth::is_cmanager()) {
            redirect('homepage');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $quotation = new Quotation();
        


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

            if ($quotation->validate($_POST)) {
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
                            $quotation->errors['image'] = "This file type not allowed";
                        }
                    } else {
                        $quotation->errors['image'] = "Could not upload image";
                    }
                }

                $quotation->insert($_POST);
                redirect('companymanager/Quotations');
            }

            $data['errors'] = $quotation->errors;


        }
        }elseif($action=='edit'){
            $data['row'] = $row = $quotation->first(['id'=>$id]);
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            
                $quotation->update($id,$_POST);
                redirect('companymanager/Quotations');
            }
            
        }
        elseif($action=='delete'){
            $quotation->delete($id);
            redirect('companymanager/Quotations');
        }
        else{
            $data['rows'] = $quotation->findAll('asc');
        }
        

        $this->view('companymanager/Quotations',$data);
    }
    

    
}
