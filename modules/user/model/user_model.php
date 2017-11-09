<?php

/*
 * mvc ;
 * user_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 5, 2017;
 * 1:04:41 AM;
 * Jakarta International Container Terminal (JICT);
 */

class User_Model extends Model {

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

    public function editUser($data) {
        $result = $this->db->callProcedure('editUser',$data,array('ErrorMessage','ErrorCode'));
        return $result[0];
        
    }
    public function addUser($data) {
        $result = $this->db->callProcedure('addUser',$data,array('ErrorMessage','ErrorCode'));
        return $result[0];
        
    }
    public function delUser($data) {
        $result = $this->db->callProcedure('deleteUser',$data,array('ErrorMessage','ErrorCode'));
        return $result[0];
        
    }
}
