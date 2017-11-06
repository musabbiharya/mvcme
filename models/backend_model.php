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
}