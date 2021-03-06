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
 protected $table ='tblUsers';
    public function __construct() {
        parent::__construct();
    }

    public function getUserAll() {
        return $this->db->select("select * from $this->table");
    }

    public function getUser($id) {
        return $this->db->select("select * from $this->table where id = '$id'");
    }

    public function getGroupAll() {
        return $this->db->select("select * from groupstaff ");
    }

    
    public function addUser($data) {
        $result = $this->db->callProcedure('addUser',$data,array('ErrorMessage','ErrorCode'));
        return $result[0];
        
    }
    public function delUser($data) {
        $result = $this->db->callProcedure('deleteUser',$data,array('ErrorMessage','ErrorCode'));
        return $result[0];
        
    }
    public function getBelow($data) {
        $user = $this->db->select("select groupid from $this->table where id= $data ");
        
        $group = $this->db->select("select id,parent from groupstaff where parent = ".$user[0]['groupid']);
        foreach ($group as $value) {
            
            $groupchild = $this->db->select("select id,parent from groupstaff where parent = ".$value['id']);
            foreach ($groupchild as $valuegc) {
                array_push($group, $valuegc);
                
            }
        }
        
        $result= [];
        foreach ($group as  $value) {
            $datauser = $this->db->select("select * from user where groupid =". $value['id']);
           foreach ($datauser as $valueDu) {
                array_push($result, $valueDu);
                
            }
        }
//        var_dump($result);exit();
        return $result;
        
    }
    public function getEmployee() {
         $user = $this->db->select("select * from employee  ");
         return $user;
    }
}
