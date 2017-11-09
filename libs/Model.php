<?php

class Model {
    protected $table;
            function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->log = new Logging();
        $this->log->lfile('/Users/satria/Sites/mymvc/log/logfile_'.date('dMY').'.txt');
    }
    public function edit($data) {
        $where ="id = $data[id] ";
        unset($data['id']);
        return ($this->db->update($this->table,$data,$where));
        
    }
    public function add($data) {
        
        return ($this->db->insert($this->table,$data));
        
    }
    public function del($data) {
        $where = "id = $data";
        return ($this->db->delete($this->table,$where));
        
    }
    public function get($id){
        $customQuery = "";
        if (isset($id)){
            $customQuery =" where id = $id";
        }
        $query = "select * from $this->table ".$customQuery;
        return $this->db->select($query);
    }

}