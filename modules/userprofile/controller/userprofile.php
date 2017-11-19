<?php

/*
 * mvc ;
 * user.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 5, 2017;
 * 1:01:05 AM;
 * Jakarta International Container Terminal (JICT);
 */

class Userprofile extends Backend {

    protected $module_name = 'userprofile';
    protected $_title = 'User Profile';

    public function _construct() {
        parent::__construct();
    }
    public function Index($param) {
        header('location:'.URL.'userprofile/userprofile/edit');
    }

    public function edit() {
        $this->view->js = array('js/edit.js');
        $this->view->title = "Edit User";
        $data = $this->model->getUser($this->id);
        $this->view->userData = $data[0];
        $this->rendering('edit');
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
    public function changePass() {
        $this->view->js = array('js/editPass.js');
        $this->view->title = "Edit Pass";
        $data = $this->model->getUser($this->id);
        $this->view->userData = $data[0];
        $this->rendering('editPass');
    }

    public function save($id) {
        $datauser = $this->model->getUser($id);

        $datainput = filter_input_array(INPUT_POST);
        $datainput['createdby'] = $this->id;
        if (isset($id)) {
            $data['id'] = $id;
        }
        $data['password'] = md5($datainput['newpass']);
        if ($datauser[0]['password'] !== md5($datainput['oldpass'])) {
            $msg = 'wrong password';
            echo json_encode(array('success' => false, 'msg' => $msg));
        } else {
            $result = $this->model->edit($data);
            $success = ($result === 1) ? true : false;
            $msg = ($result === 1) ? 'success' : 'failed';
            echo json_encode(array('success' => $success, 'msg' => $msg));
        }
//        var_dump($data);
    }

}
