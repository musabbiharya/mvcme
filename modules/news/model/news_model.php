<?php

/*
* mymvc ;
* news_model.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 10:20:49 PM;
* Jakarta International Container Terminal (JICT);
*/

class News_Model extends Model {
    protected $table ='news';
    protected $parent='category';
    protected $joiner = 'news.catid=category.id';
    protected $joincolumn =array('category'=>'category');
    public function __construct() {
        parent::__construct();
    }

}
