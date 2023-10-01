<?php
// require "functions.php";
// require "Database.php";

class Main_model {
    //create sql string using associative array
    use Database;
    public $tablename = "table";

    //add a new entry
    public function add($data){
        //insert into table(emp_id, requested_date, first_name, last_name, reason) values(:emp_id, :requested_date, :first_name, :last_name, :reason)
        $sql = "insert into ".$this->tablename."(";
        foreach($data as $key => $value){
            $sql .= $key.", ";
        }
        $sql = trim($sql, ", ");
        $sql .= ") values(";
        foreach($data as $key => $value){
            $sql .= ":".$key.", ";
        }
        $sql = trim($sql, ", ");
        $sql .= ")";

        show($sql);
        
        $query_res = $this->prepare_stm($sql, $data);
        show($query_res);
        return $query_res;
    }


    //retrieve specific columns
    public function retrieve($columns = [], $where_cond = []){
        // select emp_id, first_name from table where emp_id= :emp_id
        // select * from table where emp_id= :emp_id ---------  retrieve([], $where);
        // select emp_id, first_name from table
        $sql = "select ";
        if($columns){
            foreach($columns as $key){
                $sql .= $key.", ";
            }
            $sql = trim($sql, ", ");
        }
        else{
            $sql .= "*"; 
        }
        $sql .= " from ".$this->tablename;
        if ($where_cond){
            $sql .= " where ";
            foreach($where_cond as $key => $value){
                $sql .= $key."= :".$key.", ";
            }
            $sql = trim($sql, ", ");
        }

        show($sql);

        $query_res = $this->prepare_stm($sql, $where_cond);
        show($query_res);
        return $query_res;
    }

    //update entry
    public function update($data, $where_cond){
        $sql = "update ".$this->tablename." set ";
        foreach($data as $key => $value){
            $sql .= $key." = :".$key.", ";
        }
        $sql = trim($sql, ", ");
        if ($where_cond){
            $sql .= " where ";
            foreach($where_cond as $key => $value){
                $sql .= $key."= :".$key.", ";
            }
            $sql = trim($sql, ", ");
        }

        show($sql);

        $query_res = $this->prepare_stm($sql, array_merge($data, $where_cond));
        show($query_res);
        return $query_res;
    }


    //delete entry
    public function delete($where_cond){
        $sql = "delete from ".$this->tablename." where ";
        foreach($where_cond as $key => $value){
            $sql .= $key."= :".$key.", ";
        }
        $sql = trim($sql, ", ");

        show($sql);

        $query_res = $this->prepare_stm($sql, $where_cond);
        show($query_res);
        show("deleted");
        return $query_res;
    }
}

?>