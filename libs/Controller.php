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
    public function loadModel($name=null, $modulename=null, $modelPath = 'models/') {

        if (!empty($modulename)) {
            $path = 'modules/' . $modulename . '/model/' . $name . '_model.php';
        } else {
            $path = $modelPath . $name . '_model.php';
        }
        require $path;

        $modelName = $name . '_Model';
        $this->model = new $modelName();
    }

    public function loadCustomModel($name, $modulename, $modelPath = 'models/') {

        if (!empty($modulename)) {
            $path = 'modules/' . $modulename . '/model/' . $name . '_model.php';
        } else {
            $path = $modelPath . $name . '_model.php';
        }
        require $path;

        $modelName = $name . '_Model';
        $objname = strtolower($modelName);
        $this->$objname = new $modelName();
    }

    function removeElementArray($array, $key, $value) {
        foreach ($array as $subKey => $subArray) {
            if ($subArray[$key] !== $value) {
                unset($array[$subKey]);
            }
        }
        return $array;
    }
    
}
