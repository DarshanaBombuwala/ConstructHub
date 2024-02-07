<?php

class Auth{
    
    public static function authenticate($row){
        if(is_object($row)){
            $_SESSION['USER_DATA'] = $row;
            $_SESSION['USER_WELCOME'] = $row;
        }
        
    }

    public static function logout(){
        if(!empty($_SESSION['USER_DATA'])){
            unset($_SESSION['USER_DATA']); 

            //session_unset();
            //session_regenerate_id();
        }
               
    }

    public static function logged_in(){
        if(!empty( $_SESSION['USER_DATA'])){
            return true;
        }

        return false;
    }

    public static function is_admin(){
        if(!empty($_SESSION['USER_DATA']->role)){
            if(!empty( $_SESSION['USER_DATA']->role == 'admin')){
                return true;
            }  
        }
        

        return false;
    }
    public static function is_cmanager(){
        if(!empty($_SESSION['USER_DATA']->role)){
            if(!empty( $_SESSION['USER_DATA']->role == 'companymanager')){
                return true;
            }  
        }

        return false;
    }
    public static function is_rmanager(){
        if(!empty($_SESSION['USER_DATA']->role)){
            if(!empty( $_SESSION['USER_DATA']->role == 'rentalmanager')){
                return true;
            }  
        }

        return false;
    }
    public static function is_professional(){
        if(!empty($_SESSION['USER_DATA']->role)){
            if(!empty( $_SESSION['USER_DATA']->role == 'professional')){
                return true;
            }  
        }

        return false;
    }

    public static function __callStatic($funcname,$args){
        $key = str_replace("get","",strtolower($funcname));
        if(!empty($_SESSION['USER_DATA']->$key)){
            return $_SESSION['USER_DATA']->$key;
        }
        return '';
    }
}