<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class Career_Model extends Model {
    protected $table ='career';
    protected $parent='departement';
    protected $joiner = 'career.deptid=departement.id';
    protected $joincolumn =array('departement'=>'departement');
    public function __construct() {
        parent::__construct();
    }

}
