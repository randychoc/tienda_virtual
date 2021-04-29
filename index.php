<?php    
    //requerir config.php
    require_once("Config/Config.php"); 
    // captura de datos por medio de la url con validación
    $url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';    
    $arrayUrl = explode("/", $url);
    $controller = $arrayUrl[0];
    $method = $arrayUrl[0];
    $params = "";
    if (!empty($arrayUrl[1])) 
    {
        if ($arrayUrl[1] != "") 
        {
            $method = $arrayUrl[1];
        }
    }
    if (!empty($arrayUrl[2])) 
    {
        if ($arrayUrl[2] != "") {            
            for ($i=2; $i < count($arrayUrl); $i++) 
            { 
                $params .= $arrayUrl[$i] . ',';
            }
            $params = trim($params, ',');            
        }        
    }

    //función para poder cargar las clases de forma automática
    spl_autoload_register(function($class)
    {
        //echo LIBS.'Core/'.$class.".php";
        if (file_exists(LIBS.'Core/'.$class.".php")) 
        {
            require_once(LIBS.'Core/'.$class.".php");
        }   
    });

    //load.php
    $controllerFile = "Controllers/".$controller.".php";
    if (file_exists($controllerFile)) 
    {
        require_once($controllerFile);
        $controller = new $controller();
        if (method_exists($controller, $method)) 
        {
            $controller->{$method}($params);
        }
        else {
            echo "No existe el Método.";
        }
    }
    else {
        echo "No existe Controlador."; 
    }

    // echo "<br>";
    // echo "Controlador: " . $controller . "<br>"; 
    // echo "Método: " . $method . "<br>"; 
    // echo "Parámetros: " . $params . "<br>";

?>