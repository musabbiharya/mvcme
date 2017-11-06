<?php

/*
 * mvc ;
 * user.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 5, 2017;
 * 1:01:05 AM;
 * Jakarta International Container Terminal (JICT);
 */

class User extends Backend {

    public function _construct() {
        parent::__construct();
    }

    public function Index() {
        $this->view->title = "Manage User";
        $this->view->userList = $this->model->getUserAll();
        $this->rendering('user', 'index');
    }

    public function edit($id) {
        $this->view->js = array('js/edit.js');
        $this->view->title = "Edit User";
        $data = $this->model->getUser($id);
        $this->view->userData = $data[0];
        $this->view->userGroup=$this->model->getGroupAll();
        $this->rendering('user', 'edit');
    }
    public function save($id){
        $data['id']=$id;
        $data['username']= filter_input(INPUT_POST, 'username');
       
        $data['groupid']= filter_input(INPUT_POST, 'groupid');
        $data['fname']= filter_input(INPUT_POST, 'fname');
        $data['lname']= filter_input(INPUT_POST, 'lname');
        $result = $this->model->update($data);
      echo json_encode(array('error'=>0,'msg'=>$_POST['username']));
    }
    

}
