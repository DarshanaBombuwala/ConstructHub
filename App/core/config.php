<?php

if($_SERVER["SERVER_NAME"] == "localhost"){
   define('DBHOST','localhost');
   define('DBNAME','constructhub_db');
   define('DBUSER','root');
   define('DBPASS','');
   define('DBDRIVER','mysql');
   define('ROOT','http://localhost/groupProject/Construct_hub_grp/Public');
  
}
else{
    define('DBHOST','localhost');
    define('DBNAME','constructhub_db');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');




}

