<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuti_model
 *
 * @author Satria Persada <triasada@yahoo.com>
 */
class Cuti_Model extends Model{
   protected $table = 'cuti';
//     protected $order='order_column';
    protected $order_sort = 'asc';

    public function __construct() {
        parent::__construct();
    }
    
    public function get($id) {
        if (is_array($id)){
        $id= implode("','", $id);
        
        }
        $query = "Select * from $this->table where empid IN ('$id') and status <> 'Approved' ";
        return $this->db->select($query);
        
    }
     public function getAll($id) {
        if (is_array($id)){
        $id= implode("','", $id);
        
        }
        $query = "Select a.*,b.fullName from $this->table a join employee b on a.empid=b.id where a.empid IN ('$id')";
        return $this->db->select($query);
        
    }
    public function approve($id,$date) {
//        $date = date("Y-m-d", strtotime("-1 days"));
        $query = "update  cuti set status='Approved' where id=$id  ";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $count = $sth->rowCount();
        return $count;
    }
    public function rejected($id,$date) {
//        $date = date("Y-m-d", strtotime("-1 days"));
        $query = "update  cuti set status='Rejected' where id=$id ";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $count = $sth->rowCount();
        return $count;
    }
}
