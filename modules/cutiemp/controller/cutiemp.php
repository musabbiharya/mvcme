<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cuti
 *
 * @author Satria Persada <triasada@yahoo.com>
 */
class Cutiemp extends Backend {

    protected $module_name = 'cutiemp';
    protected $_title = 'Leave ';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('group', 'group');
        $this->loadCustomModel('absen', 'absen');
        $this->loadCustomModel('cuti', 'cuti');
    }

    public function Index() {

        $result['data']['pribadi'] = $this->cuti_model->get($this->id);
        $this->view->js = array('js/index.js');
        $this->view->data = $result;
        $this->view->title = $this->_title;
        $this->rendering('pribadi');
    }

    public function save($id = null) {
        $data = filter_input_array(INPUT_POST);
        if (isset($_FILES['file'])) {
            if ($_FILES['file']['size'] > 2000000) {
                throw new Error('Exceeded filesize limit.');
            }
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                    $finfo->file($_FILES['file']['tmp_name']), array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                    ), true
                    )) {
                throw new RuntimeException('Invalid file format.');
            }
            $dirname = UPLOAD . 'evidence/' . date('Y') . '/' . date('M') . '/' . date('d');
            if (!file_exists($dirname)) {
                if (!mkdir($dirname, 0777, true)) {
                    echo "Cannot create file ($dirname)";
                    exit;
                }
            }
            $uploadfile = $dirname .'/'. basename($_FILES['file']['name']);
            if (!move_uploaded_file(
                            $_FILES['file']['tmp_name'],$uploadfile
                    )) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            $data['bukti']='evidence/' . date('Y') . '/' . date('M') . '/' . date('d').'/'.basename($_FILES['file']['name']);
        }
        $data['createdby'] = $this->id;
        $data['empid'] = $this->id;
        $data['status'] = 'Applied';
//        var_dump($data);die;
        $result = (isset($id)) ? $this->model->edit($data, $id) : $this->model->add($data);
//        var_dump($result);die;
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
//        var_dump($data);
    }

}
