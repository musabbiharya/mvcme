<?php

/*
 * mymvc ;
 * news.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 9:58:07 PM;
 * Jakarta International Container Terminal (JICT);
 */

class Absen extends Backend {

    protected $module_name = 'absen';
    protected $_title = 'GEO Tag Absensi';

    function __construct() {
        parent::__construct();
        $this->loadCustomModel('group', 'group');
        $this->loadCustomModel('sites', 'sites');
    }

    public function Index() {

        $this->view->js = array('js/index.js');
        $this->view->title = $this->_title;
        $this->rendering('index');
    }

    public function getloc($userid) {
        $siteid = $this->model->get($userid)[0]['sitesid'];
        $siteloc = $this->sites_model->get($siteid)[0] ["loc"];
        echo json_encode($siteloc);
    }

    public function getdistance() {
        $input = filter_input_array(INPUT_POST);
        $from = explode(',', $input['userloc']);
        $to = explode(',', $input['siteloc']);
        $dist = $this->haversineGreatCircleDistance($from[0], $from[1], $to[0], $to[1]);
        $out['distance'] = $dist;
        $absensitoday = $this->model->getAttendaceInToday($this->id);
        $out['outatt'] = $this->model->getAttendaceOutToday($this->id);
        $out['inatt'] = $absensitoday;

        echo json_encode($out);
    }

    public function absenin() {
        $input = filter_input_array(INPUT_POST);
        $rawData = $input['imgBase64'];
        $dirname =  UPLOAD . date('Y') . '/' . date('M') . '/' . date('d') ;
        if(!file_exists($dirname)){
            if(!mkdir($dirname,0777, true)){
                 echo "Cannot create file ($dirname)";
                exit;
            }
            
        }
        $filename =  $dirname.'/'.$this->id . '-masuk.jpg';
//        print $rawData;die;
        $filteredData = explode(',', $rawData);
        $unencoded = base64_decode($filteredData[1]);
        if (is_writable($dirname)) {
            if (!$fp = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($fp, $unencoded) === FALSE) {
                echo "Cannot write to file ($filename)";
                exit;
            }
            $insert = $this->model->absenIn($this->id, $input['userloc']);
            echo json_encode($insert);

            fclose($fp);
        } else {
            echo json_encode(0);
        }
        
    }

    public function absenout() {
       $input = filter_input_array(INPUT_POST);
        $rawData = $input['imgBase64'];
        $dirname =  UPLOAD . date('Y') . '/' . date('M') . '/' . date('d') ;
        if(!file_exists($dirname)){
            if(!mkdir($dirname,0777, true)){
                 echo "Cannot create file ($dirname)";
                exit;
            }
            
        }
        $filename =  $dirname.'/'.$this->id . '-pulang.jpg';
//        print $rawData;die;
        $filteredData = explode(',', $rawData);
        $unencoded = base64_decode($filteredData[1]);
        if (is_writable($dirname)) {
            if (!$fp = fopen($filename, 'a')) {
                echo "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($fp, $unencoded) === FALSE) {
                echo "Cannot write to file ($filename)";
                exit;
            }
            $insert = $this->model->absenOut($this->id, $input['userloc']);
            echo json_encode($insert);

            fclose($fp);
        } else {
            echo json_encode(0);
        }
    }

    function haversineGreatCircleDistance(
    $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

}
