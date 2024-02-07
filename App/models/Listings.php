<?php

class listing extends Main_model {

    public $errors = [];
    public function __construct($currentTable)
    {
      
        if ($currentTable == 'equipments') {
            $this->table = 'equipmentsListing';
            $this->allowedColumns = [
                'name',
                'availability',
                'specialities',
                'description',
                'category',
            ];
        }elseif($currentTable=='professional'){
            $this->table = 'professionalsListing';
            $this->allowedColumns = [
                'name',
                'availability',
                'specialities',
                'description',
                'category',
            ];
        }
    }
    
  
    

    public function validate($data){
        $this->errors = [] ;

        
        

        if(empty($this->errors)){
            return true;
        }
        return false;
    }

    public function latest(){
        $query = "SELECT *FROM equipmentsListing ORDER BY equipmentTypeId DESC LIMIT 1";

        $res =$this->query($query);
        if(is_array($res)){
            return $res;
        }

        return false;
    }

    public function firstview($id){
        $query = "SELECT * FROM equipmentsListing WHERE equipmentTypeId = $id";
        $res =$this->query($query);
        if(is_array($res)){
            return $res;
        }

        return false;

    }

    public function equipmentInstanceCount($id){
        $query = "SELECT COUNT(*) AS instance_count FROM equipments WHERE equipmentTypeId = $id";
    
        $res =$this->query($query);
        if(is_array($res)){
            return $res;
        }

        return false;
    }
    public function dates($id=''){
        $query = "SELECT equipmentid, startDate, endDate
        FROM equipmentReservation;";
    
        $res =$this->query($query);
        if(is_array($res)){
            return $res;
        }

        return false;
    }
    public function count(){
        $query = "SELECT COUNT(*) as recordCount
        FROM equipments;";
    
        $res =$this->query($query);
        if(is_array($res)){
            return $res;
        }

        return false;
    }

    public function getColumns(){
        $query ="SELECT equipmentTypeId, name 
        FROM equipmentsListing;";

        $res =$this->query($query);
        if(is_array($res)){
            return $res;
        }

        return false;
    }
    
}

