<?php

/*
 * appatt.php
 * Satria Persada <triasada@yahoo.com> 
 * 12:27:03 PM
 * office 
 */
class Appatt extends Backend {

    protected $module_name = 'appatt';
    protected $_title = 'Approval Attendance';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('group', 'group');
        $this->loadCustomModel('absen', 'absen');
        $this->view->js = array('js/default.js');
    }

    function index($date=null) {
       
        $groupname = $this->group_model->get($_SESSION['role'])[0]['groupName'];
        if (!isset($date)){
            $date = date("Y-m-d", strtotime("-1 days"));
        }
        if ($groupname == 'Administrator') {
            $dataAbsen = $this->absen_model->getAbsenEmp(null,$date);
            foreach ($dataAbsen as $key => $value) {
                $place = explode("-", $value['dateAtt']);
                $dataAbsen[$key]['inPic'] = URL . 'upload/images/' . $place[0] . '/' . date('M', mktime(0, 0, 0, $place[1], 10)) . '/' . $place[2] . '/' . implode('-',explode(' ',$value['fullName'])) . '-masuk.jpg';
                $dataAbsen[$key]['outPic'] = URL . 'upload/images/' . $place[0] . '/' . date('M', mktime(0, 0, 0, $place[1], 10)) . '/' . $place[2] . '/' . implode('-',explode(' ',$value['fullName'])) . '-pulang.jpg';
//                $dataAbsen[$key]['outPic'] = URL . 'upload/images/' . $place[0] . '/' . $place[1] . '/' . $place[2] . '/' . $value['empid'] . '-pulang.jpg';
            }
            $this->view->data = $dataAbsen;
            $this->view->group = $groupname;
             $this->view->date = $date;
             $this->view->js = array('js/admin.js');
            $this->rendering('admin');
        } else {
            $this->rendering('index');
        }
    }

    function approve($id,$date=null) {
        if (!isset($date)){
            $date = date("Y-m-d", strtotime("-1 days"));
        }
        $result = $this->absen_model->approve($id,$date);
        echo json_encode($result);
        
    }
    function rejected($id,$date=null) {
        if (!isset($date)){
            $date = date("Y-m-d", strtotime("-1 days"));
        }
        $result = $this->absen_model->rejected($id,$date);
        echo json_encode($result);
        
    }

}
