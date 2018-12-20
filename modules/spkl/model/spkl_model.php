<?php

/*
 * mymvc ;
 * news_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 10:20:49 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Spkl_Model extends Model {

    protected $table = 'spklHeader';
    
//    protected $order = 'order_column';
//    protected $order_sort = 'asc';

    public function __construct() {
        parent::__construct();
    }
    public function get($id = null) {
        $query = "select a.*,b.fullName from $this->table a join employee b where a.createdby=b.id ";
//        return $query;
        return $this->db->select($query);
    }
    public function getList($id){
        $query = "select empid from spkldetail where idspklheader = $id";
//        return $query;
        return $this->db->select($query);
    }
    public function add($data) {
        $list = $data['emp'];
        unset ($data['emp']);
        
        $this->db->insert($this->table, $data);
        
        $lastid = $this->db->insertedID;
        foreach ($list as $val){
            $query = "insert into spkldetail (idspklheader,empid) values($lastid,$val) ";
            $this->db->select($query);
            
        }
        return 1;
        
    }
    public function del($data) {
        $where = "id = $data";
        $this->db->delete('spkldetail', "idspklheader=$data");
        return ($this->db->delete($this->table, $where));
    }

}
