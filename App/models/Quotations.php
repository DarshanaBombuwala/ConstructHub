<?php

class Quotation extends Main_model {

    public $errors = [];
    protected $table = 'quotations';
    protected $allowedColumns = [
        'categoryname',
        'profession',
        'description',
        'estimation',
        'date',
        
    ];
    

    public function validate($data){
        $this->errors = [] ;

        if(empty($data['categoryname'])){
            $this->errors['categoryname'] = "A Category is required";
        }
        if(empty($data['profession'])){
            $this->errors['profession'] = "A Profession is required";
        }
        if(empty($data['description'])){
            $this->errors['description'] = "A Description  is required";
        }
        if(empty($data['estimation'])){
            $this->errors['estimation'] = "A Estimation  is required";
        }
        

        if(empty($this->errors)){
            return true;
        }
        return false;
    }

    

    
}

