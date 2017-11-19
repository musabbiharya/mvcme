<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class Group_Model extends Model {
    protected $table ='groupStaff';
    public function __construct() {
        parent::__construct();
    }
    public function getRole($id) {
        $strquery1 = "SELECT role FROM groupStaff WHERE id = $id";
        $query1 = $this->db->select($strquery1);

        $role = explode('|', $query1[0]['role']);
        $inmenu = implode(',', $role);
        $strquery2 = "SELECT page FROM page WHERE id in ($inmenu) order by id";
        $query2 = $this->db->select($strquery2);
        $groupRole = [];
        foreach ($query2 as $value) {
            array_push($groupRole, $value['page']);
        }
        $groupRole = implode('|', $groupRole);
        return $groupRole;
    }

}
