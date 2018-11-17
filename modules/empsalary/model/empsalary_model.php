<?php

/*
 * mymvc ;
 * news_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 10:20:49 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Empsalary_Model extends Model {

    protected $table = 'salaryHeader';
    protected $order = 'id';
    protected $order_sort = 'asc';

    public function __construct() {
        parent::__construct();
    }
    
    public function getPeriod($param) {
        $query = "select $this->table.*,employee.fullName from $this->table join employee on $this->table.empid = employee.id where $this->table.periode = '$param'"; 
        return $this->db->select($query);
        
    }
    
    public function getDetail($id) {
        $query = "Select * from salaryDetail where headerid = $id order by id asc, item desc";
        return $this->db->select($query);
        
    }
   

}
