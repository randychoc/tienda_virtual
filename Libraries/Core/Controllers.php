<?php
    class Controllers
    {
        public function __construct()
        {
            $this->loadModel();
        }

        public function loadModel()
        {
            //este método nos va a servir para cargar los Modelos
            $model = get_class($this)."Model";
            $routeClass = "Models/" . $model . ".php";
            if (file_exists($routeClass)) {
                require_once($routeClass);
                $this->model = new $model();
            }
        }
    }
?>