<?php

/*
 * mvc ;
 * menu_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2017;
 * 11:17:52 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Menu_Model extends Model {
    protected $table ='menu';
    public function __construct() {
        parent::__construct();
    }
    
    public function getParent($id){
        $customQuery = "";
        if (isset($id)){
            $customQuery =" where parent = $id";
        }else{
            $customQuery =" where parent = 0";
        }
        $query = "select id,menuName from menu ".$customQuery;
        return $this->db->select($query);
    }
    public function getLastOrder(){
        
        $query = "select max(menuOrder) as menuOrder from menu ";
        return $this->db->select($query);
    }

}
