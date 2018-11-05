<?php

/*
 * mvc ;
 * index_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2017;
 * 5:26:26 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Backend_Model extends Model {

    protected $tbluser;
    protected $anak;

    public function __construct() {
        parent::__construct();
        $this->tbluser = 'employee';
        $this->anak=array();
    }

    public function getCompany() {
        $data = $this->db->select("SELECT * from company_setting");

        return $data;
    }

    public function getPage($page) {
        $data = $this->db->select("SELECT * from page where page='$page' order by order_column asc");

        return $data;
    }

    public function getMenu($id) {


        $strquery = "SELECT groupID FROM $this->tbluser WHERE id = '$id'";
        $query = $this->db->select($strquery);
        $idgroup = $query[0]['groupID'];

        $strquery1 = "SELECT role FROM groupstaff WHERE id = '$idgroup'";
        $query1 = $this->db->select($strquery1);

        $role = explode('|', $query1[0]['role']);
        $inmenu = implode(',', $role);
        $strquery2 = "SELECT * FROM page WHERE id in ($inmenu) and parent=0 order by order_column asc";
        $query2 = $this->db->select($strquery2);
        foreach ($query2 as $key => $value) {
            $strquery3 = "SELECT * FROM page WHERE id in ($inmenu) and parent=$value[id] order by order_column asc";
            $query3 = $this->db->select($strquery3);
            if (count($query3) > 0) {
                $query2[$key]['child'] = $query3;
            }
        }
        return $query2;
    }

    public function is_privileged($id, $page_id) {

        if ($page_id > 0) {
            $strquery = "SELECT groupID FROM $this->tbluser WHERE id = '$id'";
            $query = $this->db->select($strquery);
            $idgroup = $query[0]['groupID'];

            $strquery1 = "SELECT role FROM groupstaff WHERE id = '$idgroup'";
            $query1 = $this->db->select($strquery1);

            $role = explode('|', $query1[0]['role']);
            return in_array($page_id, $role);
        } else {
            return true;
        }
    }

    public function getGroup($id) {

        $strquery = "SELECT groupName FROM groupstaff WHERE id = '$id'";
        $query = $this->db->select($strquery);
        return $query;
    }

    public function getInverior($id) {
       $child=$this->getchild($id);
       if (!empty($child)){
           foreach ($child as $value) {
               array_push($this->anak,$value['id']);
           }
        
       }
        return $this->anak;
    }
    public function getchild($id) {
        $strquery = "SELECT id FROM employee WHERE parent in ('$id')";
        
        $query = $this->db->select($strquery); 
        foreach ($query as $value) {
            $this->getInverior($value['id']);
            
        }
        return $query;
    }
   

}
