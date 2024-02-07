<?php

class Leave extends Main_model {

    public $errors = [];
    protected $table = 'leaves';
    protected $allowedColumns = [
        'startdate',
        'enddate',
        'duration',
        'leavetype',
        'reason',
        'status',
        'userid',
    ];
    

    public function validate($data){
        $this->errors = [] ;

        if(empty($data['startdate'])){
            $this->errors['startdate'] = "A Start Date is required";
        }
        if(empty($data['enddate'])){
            $this->errors['enddate'] = "An End Date is required";
        }
        if(empty($data['duration'])){
            $this->errors['duration'] = "A Duration is required";
        }
        if(empty($data['leavetype'])){
            $this->errors['leavetype'] = "A Leave Type is required";
        }
        if(empty($data['reason'])){
            $this->errors['reason'] = "A Reason is required";
        }
       
        

        if(empty($this->errors)){
            return true;
        }
        return false;
    }   
}