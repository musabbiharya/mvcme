<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class Employeebasic_Model extends Model {
    protected $table ='emp_salary';
  protected $parent = 'employee';
    protected $joiner='emp_salary.id=employee.id';
    protected $joincolumn=array('fullName'=>'fullName');
    public function __construct() {
        parent::__construct();
    }
    
    public function get($id=null) {
        $customQuery = "";
        if (isset($id)) {
            $customQuery = " where $this->table.id = '$id'";
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
        $query = "select $this->table.* $columnJoin from $this->table  $queryJoin " . $customQuery ." ".$columnOder;
//        return $query;
        return $this->db->select($query);
    }
    public function del($data) {
        $where = "id = '$data'";
        return ($this->db->delete($this->table, $where));
    }
    public function edit($data,$where) {
        $where = "id = '$where'";
        unset($data['id']);
        return ($this->db->update($this->table, $data, $where));
    }

}
