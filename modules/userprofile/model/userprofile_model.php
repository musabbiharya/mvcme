<?php

/*
 * mvc ;
 * user_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 5, 2017;
 * 1:04:41 AM;
 * Jakarta International Container Terminal (JICT);
 */

class Userprofile_Model extends Model {
 protected $table ='users';
    public function __construct() {
        parent::__construct();
    }

    public function getUser($id) {
        return $this->db->select("select * from user where id = '$id'");
    }

    public function editUser($data) {
        $result = $this->db->callProcedure('editUser',$data,array('ErrorMessage','ErrorCode'));
        return $result[0];
        
    }
   
}
