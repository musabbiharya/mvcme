<?php

/*
 * mymvc ;
 * news_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 10:20:49 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Invoice_Model extends Model {

    protected $table = 'project_price';
    protected $order = 'id';
    protected $order_sort = 'asc';

    public function __construct() {
        parent::__construct();
    }
    public function addProjectChild($data,$param) {
        
        $this->delChild($param);
        foreach ($data['idItems'] as $key => $value) {
            $price = $data['price'][$key];
            $unit = $data['unit'][$key];
            $query ="insert into $this->table (idProject,idItems,price,unit) values('$param','$value','$price','$unit')";
            $this->db->select($query);
        }
        return true;
        
    }
    
    public function delChild($idproject) {
        
        $query = "delete from $this->table where idProject =$idproject ";
        $this->db->select($query) ;
        return false;
        
    }
    public function getIdProject($id) {
        $query ="select $this->table.* ,items.name from $this->table left join items on $this->table.idItems=items.id  where $this->table.idProject =$id order by $this->table.id asc";
        return $this->db->select($query) ;
                
        
    }
    public function getPages($start,$end) {
        $query ="select sum(page) as total from tblDocuments where date between $start and $end";
        return $this->db->select($query)[0] ;
        
    }

}
