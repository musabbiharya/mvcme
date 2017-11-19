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

    protected $module_name = 'user';
    protected $_title = 'Manage user';

    public function _construct() {
        parent::__construct();
    }

    public function Index() {
        $this->view->title = "Manage User";
        $this->view->js = array('js/index.js');
        $this->view->userList = $this->model->getUserAll();
        $this->rendering('index');
    }

    public function edit($id) {
        $this->view->js = array('js/edit.js');
        $this->view->title = "Edit User";
        $data = $this->model->getUser($id);
        $this->view->userData = $data[0];
        $this->view->userGroup = $this->model->getGroupAll();
        $this->rendering('edit');
    }

    public function add() {
        $this->view->js = array('js/add.js');
        $this->view->title = "Add User";
        $this->view->userGroup = $this->model->getGroupAll();
        $this->rendering('add');
    }

    public function editSave($id) {
        $data[0] = $id;
        $data[1] = (string) filter_input(INPUT_POST, 'username');

        $data[2] = filter_input(INPUT_POST, 'groupid');
        $data[3] = filter_input(INPUT_POST, 'fname');
        $data[4] = filter_input(INPUT_POST, 'lname');
        $data[5] = $this->id;
        $result = $this->model->editUser($data);
        $success = ($result['ErrorCode'] == '00') ? true : false;
        echo json_encode(array('success' => $success, 'msg' => $result['ErrorMessage']));
    }

    public function addSave() {

        $data[0] = filter_input(INPUT_POST, 'username');
        $data[1] = filter_input(INPUT_POST, 'password');
        $data[2] = filter_input(INPUT_POST, 'groupid');
        $data[3] = filter_input(INPUT_POST, 'fname');
        $data[4] = filter_input(INPUT_POST, 'lname');
        $data[5] = filter_input(INPUT_POST, 'address');
        $data[6] = filter_input(INPUT_POST, 'email');
        $data[7] = $this->id;
        $result = $this->model->addUser($data);
        $success = ($result['ErrorCode'] == '00') ? true : false;
        echo json_encode(array('success' => $success, 'msg' => $result['ErrorMessage']));
    }

    public function delUser($id) {
        $result = $this->model->delUser(array($id, $this->id));
        $success = ($result['ErrorCode'] == '00') ? true : false;
        echo json_encode(array('success' => $success, 'msg' => $result['ErrorMessage']));
    }
   

}
