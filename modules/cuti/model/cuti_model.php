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
        $query = "Select * from $this->table where empid IN ('$id')and status <> 'Approved'";
        return $this->db->select($query);
        
    }
}
