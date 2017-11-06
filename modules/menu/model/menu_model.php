<?php

/*
 * mvc ;
 * menu_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 4, 2017;
 * 11:17:52 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Menu_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function getMenu(){
        return $this->db->select(  'select * from menu' );
    }

}
