<?php


class Main_model extends Database
{

    protected $table = '';
    protected $allowedColumns = [];

    public function insert($data)
    {
        //show('here2');
        //echo json_encode(['message' => $this->table]);
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "insert into " . $this->table;
        $query .= "(" . implode(",", $keys) . ") values(:" . implode(",:", $keys) . ")";
        //show($query);
        // show($data);
        //   echo json_encode(['message' => $query]);
        $this->query($query, $data);
    }

    public function update($id, $data)
    {

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



    public function where($data)
    {

        $keys = array_keys($data);
        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");

        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res;
        }

        return false;
    }
    public function findAll($order = 'desc', $key = 'id')
    {

        $query = "select * from " . $this->table . " order by $key $order ";

        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }
    public function sortAll($order = 'asc', $key = 'id', $conditions)
    {
    
        $query = "SELECT * FROM $this->table";
        if (!empty($conditions)) {
            $query .= " WHERE ";
            $conditionsArray = array();
            foreach ($conditions as $conditionKey => $value) {
                $conditionsArray[] = "$conditionKey = '" . $value . "'";
            }
            $query .= implode(" AND ", $conditionsArray);
        }
        $query .= " ORDER BY $key $order";
    
        
        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }
    
        return false;
    }

    public function sortColumns($key = 'id',$selectColumns = ['*'], $conditions,$order = 'asc' )
{
    $selectString = implode(', ', $selectColumns);
    $query = "SELECT $selectString FROM $this->table";

    if (!empty($conditions)) {
        $query .= " WHERE ";
        $conditionsArray = array();
        foreach ($conditions as $conditionKey => $value) {
            $conditionsArray[] = "$conditionKey = '" . $value . "'";
        }
        $query .= implode(" AND ", $conditionsArray);
    }

    $query .= " ORDER BY $key $order";

    

    $res = $this->query($query);
    if (is_array($res)) {
        return $res;
    }

    return false;
}

    

    public function first($data, $order = 'desc')
    {

        $keys = array_keys($data);
        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");
        $query .= " order by id $order limit 1";

        $res = $this->query($query, $data);

        if (is_array($res)) {
            return $res[0];
        }

        return false;
    }

    public function delete($key = 'id')
    {
        // Assuming that $id is an integer (if not, validate/sanitize it)
        $query = "DELETE FROM " . $this->table . " WHERE id = :$key";

        // Bind the ID to the query
        $data = ['id' => $key];

        // Execute the delete query
        $this->query($query, $data);
    }
}
