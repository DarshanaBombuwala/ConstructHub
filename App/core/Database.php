<?php

trait Database{

    // connect to a MySQL database from PHP using PDO.
    private function connect(){
        require "config.php";

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $pdo = new PDO($dsn, $user, $password);

            if ($pdo) {
                // echo "Connected to the $db database successfully!";
                return $pdo;
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // A prepared statement is a template for executing one or more SQL statements with different values.
    //  A prepared statement is highly efficient and helps protect the application against SQL injections.
    public function prepare_stm($sql, $As_arr){
        $pdo = $this->connect();
        if ($pdo){
            $statement = $pdo->prepare($sql);
            $statement->execute($As_arr);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            // show($result);
            return $result;
        }
        else{
            return false;
        }

    }
}
?>
