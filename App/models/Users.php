<?php

class User extends Main_model {

    public $errors = [];
    protected $table = 'users';
    protected $allowedColumns = [
        'email',
        'firstname',
        'lastname',
        'date',
        'role',
        'password',
        'image',
    ];
    

    public function validate($data){
        $this->errors = [] ;

        if(empty($data['firstname'])){
            $this->errors['firstname'] = "A First name is required";
        }
        if(empty($data['lastname'])){
            $this->errors['lastname'] = "A Lastname name is required";
        }
        if(empty($data['password'])){
            $this->errors['password'] = "A Password is required";
        }
        if(empty($data['role'])){
            $this->errors['role'] = "A Role is required";
        }

        
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Email is not valid";
        }
        else 
        if($this->where(['email' => $data['email']])){
            $this->errors['email'] = "This email already exists";
        }

        if(empty($this->errors)){
            return true;
        }
        return false;
    }

    

    
}

