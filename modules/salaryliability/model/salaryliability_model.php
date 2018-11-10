<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class Salaryliability_Model extends Model {
    protected $table ='liability';
//  protected $parent = 'employee';
//    protected $joiner='empsalary.id=employee.id';
//    protected $joincolumn=array('fullName'=>'fullName');
    public function __construct() {
        parent::__construct();
    }
    public function get($id=null) {
        $customQuery = "";
        if (isset($id)) {
            $customQuery = " and $this->table.id = $id";
        }
        $queryJoin = "";
        $columnJoin = "";
        $columnOder = "";
        if ($this->parent !== NULL) {
            foreach ($this->joincolumn as $key => $value) {
                $columnJoin .= ",$this->parent.$value as $key";
            }

            $queryJoin = "join $this->parent  on $this->joiner ";
        }
        if ($this->order !== NULL){
            $columnOder = "order by $this->table.$this->order $this->order_sort";
        }
        $query = "select $this->table.* $columnJoin from $this->table  $queryJoin where $this->table.paidby=1" . $customQuery ." ".$columnOder ;
        return $this->db->select($query);
    }
    
    
}
