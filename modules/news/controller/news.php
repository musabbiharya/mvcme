<?php

/*
* mymvc ;
* news.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 9, 2017;
* 9:58:07 PM;
* Jakarta International Container Terminal (JICT);
*/

class News extends Backend{
    protected $module_name='news';
    protected $_title='Manage News';
            function __construct() {
        parent::__construct();
        $this->loadCustomModel('category', 'category');
        
    }
    public function add() {
        $this->view->parent = $this->category_model->get();
        $width = '100%';
        $height = '500px';
        $this->editor($width,$height);
        parent::add();
    }
    public function edit($id) {
        $this->view->parent = $this->category_model->get();
        $width = '100%';
        $height = '500px';
        $this->editor($width,$height);
        parent::edit($id);
    }
    function editor($width,$height) {
    $this->ckeditor = new CKEditor();
    $this->ckfinder = new CKFinder();
    $this->ckeditor->basePath = URL.'public/ckeditor/';
    $this->ckeditor-> config['toolbar'] = 'Full';
    $this->ckeditor->config['language'] = 'en';
    $this->ckeditor-> config['width'] = $width;
    $this->ckeditor-> config['height'] = $height;
    $path =  '/~satria/mymvc/public/ckfinder/'; //path folder ckfinder
    $this->ckfinder->SetupCKEditor($this->ckeditor,$path);
    $this->view->ckeditor=$this->ckeditor;
    
  }
    
    
}