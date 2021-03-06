<?php
class ResultSet{
    private $query;

    public function __construct($queryName){
        $this->query = $queryName;
    }

    public function toArray(){
        $data = array();


        if($this->query) {

            while($record = oci_fetch_assoc($this->query)){
                array_push($data, $record);
            }

        }
        return $data;
    }

    public function toObject(){
        $data = array();

        if($this->query) {

            while($record = oci_fetch_object($this->query)){
                array_push($data, $record);
            }

        }

        return $data;
    }

    public function numRows() {

        return oci_num_rows($this->query);
    }
}