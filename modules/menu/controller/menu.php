<?php

/*
* mvc ;
* menu.php ;
* Satria Persada <triasada@yahoo.com> ;
* Nov 4, 2017;
* 11:16:34 PM;
* Jakarta International Container Terminal (JICT);
*/
class Menu extends Backend{
    function __construct() {
        parent::__construct();
    }
    public function Index() {
         $result['data'] = $this->model->get();
         $this->view->js = array('js/index.js');
         $this->view->data = $result;
         $this->view->title = 'Manage Menu';
         $this->rendering('menu', 'index');
        
    }
    public function edit($id){
        $this->view->js = array('js/edit.js');
        $this->view->title = "Edit Menu";
        $data = $this->model->getMenu($id);
        $result['data'] = $data[0];
        $result['parent'] = $this->model->getParent();
        $this->view->data = $result;
        $this->rendering('menu', 'edit');
    }
    public function save($id) {
        $data = (isset($id))? ['id'=>$id,'menuName'=>filter_input(INPUT_POST, 'menuName'),'menuDesc'=>filter_input(INPUT_POST, 'menuDesc'),'parent'=>filter_input(INPUT_POST, 'parent'),'menuOrder'=>filter_input(INPUT_POST, 'menuOrder'),'link'=>filter_input(INPUT_POST, 'link')]:
                ['menuName'=>filter_input(INPUT_POST, 'menuName'),'menuDesc'=>filter_input(INPUT_POST, 'menuDesc'),'parent'=>filter_input(INPUT_POST, 'parent'),'menuOrder'=>filter_input(INPUT_POST, 'menuOrder'),'link'=>filter_input(INPUT_POST, 'link')];
        $result = (isset($id))?$this->model->edit($data):$this->model->add($data);
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
    }
    public function add(){
        $this->view->js = array('js/add.js');
        $this->view->title = "Add Menu";
        $result['parent'] = $this->model->getParent();
        $result['menuOrder'] = $this->model->getLastOrder()[0];
        $this->view->data = $result;
        $this->rendering('menu', 'add');
    }
    
}