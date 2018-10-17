<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class Page_Model extends Model {
    protected $table ='page';
     protected $order='order_column';
    protected $order_sort='asc';
    public function __construct() {
        parent::__construct();
    }
    
    public function getParent($id=null){
        $customQuery = "";
        if (isset($id)){
            $customQuery =" where parent = $id";
        }else{
            $customQuery =" where parent = 0";
        }
        $query = "select id,page from page ".$customQuery;
        return $this->db->select($query);
    }
    public function getLastOrder() {
         $query = "select max(order_column) as m_order_column from $this->table ";
        return $this->db->select($query);
    }

}
