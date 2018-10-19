<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class Items_Model extends Model {
    protected $table ='items';
     protected $order='id';
    protected $order_sort='asc';
    public function __construct() {
        parent::__construct();
    }
    public function getlike($param) {
        $query = "select * from $this->table where name like '%$param%'";
        $result=$this->db->select($query);
        
        return $result;
    }
    
}
