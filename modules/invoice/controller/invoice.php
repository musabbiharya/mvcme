<?php

/*
 * mymvc ;
 * news.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 9:58:07 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Invoice extends Backend {

    protected $module_name = 'invoice';
    protected $_title = 'Manage project Invoice';

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

    public function addprice($id,$period) {
        $date0=explode("-", $period);
        $month =  $date0[0];
        $year = $date0[1];
        $monthbefore = sprintf("%'.02d", (intval($month)-1));
        $startdate = '25-'.$monthbefore.'-'.$year.' 00:00';
        $enddate =  '25-'.$month.'-'.$year.' 23:59';
        $startunixtime = strtotime($startdate);
        $endunixtime = strtotime($enddate);
        
        $project = $this->project_model->get($id);
        $data = $this->model->getIdProject($id);
        foreach ($data as $key => $value) {
            if($value['unit']=='/halaman'){
                $qty=$this->model->getPages($startunixtime,$endunixtime)['total'];
                $total = $qty * $value['price'];
                $data[$key] ['qty']= $qty;  
                $data[$key] ['total'] =$total;
            }
        }
        $this->view->periode = $period;
        $this->view->data = $data;
        $this->view->datalength = count($this->view->data);
        $this->view->project = $project[0]['id'];
        $this->view->js = array('js/detail.js');
        $this->view->title =  $this->module_name . ' ' . $project[0]['name'];
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
