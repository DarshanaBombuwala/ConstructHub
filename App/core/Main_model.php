<?php


class Main_model extends Database{

    protected $table = '';
    protected $allowedColumns = [];

    public function insert($data){
        
        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "insert into " . $this->table;
        $query .= "(".implode(",",$keys).") values(:".implode(",:",$keys).")";

        
       $this->query($query,$data);
    }

    public function update($id, $data) {
        
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
    
        $query = "UPDATE " . $this->table . " SET ";
    
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }
        $query = trim($query, ", ");
        $query .= " WHERE id = :id";

        
    
        $data['id'] = $id;
        
        
        $this->query($query, $data);
        
    }
    
    

    public function where($data){
        
        $keys = array_keys($data);
        $query = "select * from " . $this->table . " where ";
        
        foreach($keys as $key){
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");

        $res =$this->query($query,$data);

        if(is_array($res)){
            return $res;
        }

        return false;
    }
    public function findAll($order='desc'){
        
        
        $query = "select * from " . $this->table . " order by id $order ";


        $res =$this->query($query);

        if(is_array($res)){
            return $res;
        }

        return false;
    }

    public function first($data,$order='desc'){
        
        $keys = array_keys($data);
        $query = "select * from " . $this->table . " where ";
        
        foreach($keys as $key){
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");
        $query .= " order by id $order limit 1";

        $res =$this->query($query,$data);

        if(is_array($res)){
            return $res[0];
        }

        return false;
    }

    public function delete($id) {
        // Assuming that $id is an integer (if not, validate/sanitize it)
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        // Bind the ID to the query
        $data = ['id' => $id];
        
        // Execute the delete query
        $this->query($query, $data);
    }
    
    
}

