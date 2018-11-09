<?php

/*
 * mymvc ;
 * news_model.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 10:20:49 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Libur_Model extends Model {

    protected $table = 'liburNasional';
//    protected $order = 'order_column';
//    protected $order_sort = 'asc';

    public function __construct() {
        parent::__construct();
    }

}
