<?php

class Equipmentlisting extends Main_model
{

    public $errors = [];
    protected $table = 'equipmentsListing';
    protected $allowedColumns = [
        'name',
        'availability',
        'specialities',
        'description',
        'categoryName',

    ];


    public function validate($data)
    {
        $this->errors = [];




        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function latest()
    {
        $query = "SELECT *FROM equipmentsListing ORDER BY equipmentTypeId DESC LIMIT 1";

        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function firstview($id)
    {
        $query = "SELECT * FROM equipmentsListing WHERE equipmentTypeId = $id";
        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function equipmentInstanceCount($id)
    {
        $query = "SELECT COUNT(*) AS instance_count FROM equipments WHERE equipmentTypeId = $id";

        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }
    public function dates($id = '')
    {
        $query = "SELECT equipmentid, startDate, endDate
        FROM reservationEquipment;";

        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }
    public function count()
    {
        $query = "SELECT COUNT(*) as recordCount
        FROM equipmentsnew;";

        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function getColumns()
    {
        $query = "SELECT equipmentTypeId, name 
        FROM equipmentsListing;";

        $res = $this->query($query);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }
}
