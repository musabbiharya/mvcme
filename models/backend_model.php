<?php

/*
* mvc ;
* index_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 4, 2017;
* 5:26:26 PM;
* Jakarta International Container Terminal (JICT);
*/
class Backend_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getCompany(){
        $data = $this->db->select("SELECT * from company_setting");
        
        return $data;
    }
    public function getPage($page){
        $data = $this->db->select("SELECT * from page where page='$page'");
        
        return $data;
    }
    public function getMenu($id) {


        $strquery = "SELECT groupid FROM user WHERE id = '$id'";
        $query = $this->db->select($strquery);
        $idgroup = $query[0]['groupid'];

        $strquery1 = "SELECT role FROM groupStaff WHERE id = '$idgroup'";
        $query1 = $this->db->select($strquery1);

        $role = explode('|', $query1[0]['role']);
        $inmenu = implode(',', $role);
        $strquery2 = "SELECT * FROM page WHERE id in ($inmenu) and parent=0 order by id";
        $query2 = $this->db->select($strquery2);
        foreach ($query2 as $key=> $value) {
            $strquery3 = "SELECT * FROM page WHERE id in ($inmenu) and parent=$value[id] order by id";
            $query3 = $this->db->select($strquery3);
            if(count($query3)>0){
               $query2[$key]['child']= $query3;
            } 
        }
        return $query2;
    }
    public function is_privileged($id, $page_id) {

        if ($page_id > 0) {
            $strquery = "SELECT groupid FROM user WHERE id = '$id'";
            $query = $this->db->select($strquery);
            $idgroup = $query[0]['groupid'];

            $strquery1 = "SELECT role FROM groupStaff WHERE id = '$idgroup'";
            $query1 = $this->db->select($strquery1);

            $role = explode('|', $query1[0]['role']);
            return in_array($page_id, $role);
        } else {
            return true;
        }
    }
}