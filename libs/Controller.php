<?php

class Controller {

    function __construct() {
        //echo 'Main controller<br />';
        $this->view = new View();
    }

    /**
     * 
     * @param string $name Name of the model
     * @param string $path Location of the models
     */
    public function loadModel($name, $modulename, $modelPath = 'models/') {

        if (!empty($modulename)) {
            $path = 'modules/' . $modulename . '/model/' . $name . '_model.php';
        } else {
            $path = $modelPath . $name . '_model.php';
        }
        require $path;

        $modelName = $name . '_Model';
        $this->model = new $modelName();
    }

}
