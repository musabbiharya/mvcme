<?php

class Bootstrap {

    private $_url = null;
    private $_controller = null;
    private $_controllerPath = 'controller/'; // Always include trailing slash
    private $_modelPath = 'model/'; // Always include trailing slash
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';
    private $_modulePath = 'modules/';
    private $_module_default = 'modules/default/';

    /**
     * Starts the Bootstrap
     * 
     * @return boolean
     */
    public function init() {
        // Sets the protected $_url
        $this->_getUrl();
        if (empty($this->_url[0])) {
            $this->_loadDefaultModule();
            return false;
        }

        $this->_loadExistingModule();
    }

    /**
     * (Optional) Set a custom path to controllers
     * @param string $path
     */
    public function setControllerPath($path) {
        $this->_controllerPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path to models
     * @param string $path
     */
    public function setModelPath($path) {
        $this->_modelPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: error.php
     */
    public function setErrorFile($path) {
        $this->_errorFile = trim($path, '/');
    }

    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: index.php
     */
    public function setDefaultFile($path) {
        $this->_defaultFile = trim($path, '/');
    }

    /**
     * Fetches the $_GET from 'url'
     */
    private function _getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * This loads if there is no GET parameter passed
     */
    private function _loadDefaultModule() {
        require $this->_module_default . $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }

    private function _loadExistingModule() {
        
        if (empty($this->_url[1])) {
            $this->_loadDefaultController();
            return false;
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

    private function _loadDefaultController() {
        $file = $this->_modulePath . $this->_url[0] . '/' . $this->_controllerPath .  $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_controller =  new $this->_url[0];
            $this->_controller->loadModel($this->_url[0],$this->_url[0]);
            $this->_controller->index();
        } else {
            $this->_error('Default Controller Not Found');
            return false;
        }
    }

    /**
     * Load an existing controller if there IS a GET parameter passed
     * 
     * @return boolean|string
     */
    private function _loadExistingController() {
        $file = $this->_modulePath . $this->_url[0] . '/' . $this->_controllerPath . $this->_url[1] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[1];
            $this->_controller->loadModel($this->_url[1],$this->_url[1]);
        } else {
            $this->_error('Page does not exist');
            return false;
        }
    }

    /**
     * If a method is passed in the GET url paremter
     * 
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     *  url[3] = Param
     *  url[4] = Param
     */
    private function _callControllerMethod() {
        $length = count($this->_url);
        // Make sure the method we are calling exists
        if ($length > 2) {
            if (!method_exists($this->_controller, $this->_url[2])) {
                $this->_error('This methode not exist');
            }
        }

        // Determine what to load
        switch ($length) {
            case 6:
                //Controller->Method(Param1, Param2, Param3)
                $this->_controller->{$this->_url[2]}($this->_url[3], $this->_url[4], $this->_url[5]);
                break;

            case 5:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[2]}($this->_url[3], $this->_url[4]);
                break;

            case 4:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[2]}($this->_url[3]);
                break;

            case 3:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[2]}();
                break;

            default:
                $this->_controller->index();
                break;
        }
    }

    /**
     * Display an error page if nothing exists
     * 
     * @return boolean
     */
    private function _error($msg = null) {
        require $this->_module_default . $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->msg = $msg;
        $this->_controller->index();
        exit;
    }

}
