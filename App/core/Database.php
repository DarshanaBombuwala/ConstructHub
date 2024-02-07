<?php

class Database{

    // connect to a MySQL database from PHP using PDO.
    private function connect(){
        $str = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;
        try {
            $con = new PDO($str, DBUSER, DBPASS);
            return $con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
    }

    public function query($query,$data = [], $type = 'object')
    {
    $con =$this->connect();
   // show($con);
  // echo json_encode(['message' => $con]);
    $stm = $con->prepare($query);
    //show($stm);
   // echo json_encode(['message' => $stm]);
    if($stm){
       // show("here23");
       //echo json_encode(['message' => $data]);
       $check = $stm->execute($data);
      //  echo json_encode(['message' => $check]);
    if($check){
            
            if($type != 'object'){
                $type = PDO::FETCH_ASSOC;
            }else{
                $type = PDO::FETCH_OBJ;
            }

            $result = $stm->fetchAll($type);

            if(is_array($result) && count($result)>0){
            return $result;
            }
        }  
    }
    return false;
    }
   
}

