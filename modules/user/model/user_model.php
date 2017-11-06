<?php

/*
* mvc ;
* user_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 5, 2017;
* 1:04:41 AM;
* Jakarta International Container Terminal (JICT);
*/
class User_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function getUserAll() {
        return $this->db->select('select * from user');
        
    }
    public function getUser($id) {
        return $this->db->select("select * from user where id = '$id'");
        
    }
     public function getGroupAll() {
        return $this->db->select("select * from groupNames ");
        
    }
    public function update($data) {
        $data = implode(',', $data);
         $result = $this->db->select("CALL editUser($data,1,@ErrorMessage,@ErrorCode)" );
         $result = $this->db->select("select @ErrorMessage,@ErrorCode ");
          var_dump($result);exit();
        return $result;
    }
}