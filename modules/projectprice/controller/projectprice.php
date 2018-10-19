<?php

/*
 * mymvc ;
 * news.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 9:58:07 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Projectprice extends Backend {

    protected $module_name = 'projectprice';
    protected $_title = 'Manage project price list';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('project', 'project');
        $this->loadCustomModel('items', 'items');
    }

    public function Index() {
        $result['data'] = $this->project_model->get();
        $this->view->js = array('js/index.js');
        $this->view->data = $result;
        $this->view->title = $this->_title;
        $this->rendering('index');
    }

    public function save($id = null) {
        $data = filter_input_array(INPUT_POST);
        if (isset($id)) {
            $data['id'] = $id;
        }
        $result = (isset($id)) ? $this->model->edit($data) : $this->model->add($data);
        $success = ($result === 1) ? true : false;
        $msg = ($result === 1) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
//        var_dump($data);
    }

    public function addprice($id) {
        $project = $this->project_model->get($id);
        $this->view->data = $this->model->getIdProject($id);
        $this->view->datalength = count($this->view->data);
        $this->view->project = $project[0]['id'];
        $this->view->js = array('js/detail.js');
        $this->view->title = "Add " . $this->module_name . ' ' . $project[0]['name'];
        $this->rendering('detail');
    }

    public function getAllitem() {
        $dt = filter_input(INPUT_GET, 'term');
//        var_dump($dt);die;
        $port = $this->items_model->getlike($dt);
        $data[] = array();
        foreach ($port as $key => $value) {

            $data[$key]['value'] = $value['id'];
            $data[$key]['label'] = $value['name'];
            $data[$key]['price'] = $value['price'];
            $data[$key]['unit'] = $value['unit'];
        }


        echo json_encode($data);
    }

    public function getitem($id) {

        $port = $this->items_model->get($id);

        echo json_encode($port[0]);
    }

    public function saveitem($param) {
        $data = filter_input_array(INPUT_POST);
        unset($data['listitem_length']);
        $result = $this->model->addProjectChild($data, $param);
        $success = ($result) ? true : false;
        $msg = ($result) ? 'success' : 'failed';
        echo json_encode(array('success' => $success, 'msg' => $msg));
    }

}
