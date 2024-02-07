<?php

class Equipment extends Main_model {

    public $errors = [];
    protected $table = 'equipmentsnew';
    protected $allowedColumns = [
        'model',
        'availabilityStatus',
        'brand',
        'equipmentTypeId',
        'presentCondition',
        'serialNumber',
        

       
        
        
    ];
    

    public function validate($data){
        $this->errors = [] ;

       /* if(empty($data['model'])){
            $this->errors['model'] = "A Model is required";
        }
        if(empty($data['serialnumber'])){
            $this->errors['serialnumber'] = "A Serial Number is required";
        }
        if(empty($data['category'])){
            $this->errors['category'] = "A Category  is required";
        }*/
        

        if(empty($this->errors)){
            return true;
        }
        return false;
    }

    

    
}

