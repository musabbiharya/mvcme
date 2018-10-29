<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class Absen_Model extends Model {
    protected $table ='employee';
//     protected $order='order_column';
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
        $query = "select id,fullName from $this->table ".$customQuery;
        return $this->db->select($query);
    }
    public function getLastOrder() {
         $query = "select max(order_column) as m_order_column from $this->table ";
        return $this->db->select($query);
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
    
    public function getAttendaceInToday($id) {
        $date = date ("Y-m-d");
        $query = "SELECT * FROM attendance where  date_format(timelock, '%Y-%m-%d') = '$date' and empid = '$id' and remark ='IN' ";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $count =  $sth->rowCount();
        return $count;
        
    }
    public function getAttendaceOutToday($id) {
        $date = date ("Y-m-d");
        $query = "SELECT * FROM attendance where  date_format(timelock, '%Y-%m-%d') = '$date' and empid = '$id' and remark ='OUT' ";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $count =  $sth->rowCount();
        return $count;
        
    }
     public function absenIn($id=null,$loc=null) {
        $query = "insert into attendance (empid,loc,remark) values ($id,'$loc','IN') ";
//        return $query;
        $sth = $this->db->prepare($query);
        $sth->execute();
        $count =  $sth->rowCount();
        return $count;
        
    }
    public function absenOut($id=null,$loc=null) {
        $query = "insert into attendance (empid,loc,remark) values ($id,'$loc','OUT') ";
//        return $query;
        $sth = $this->db->prepare($query);
        $sth->execute();
        $count =  $sth->rowCount();
        return $count;
        
    }

}
