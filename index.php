<?php    
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
    echo "<br>";
    echo "Controlador: " . $controller . "<br>"; 
    echo "Método: " . $method . "<br>"; 
    echo "Parámetros: " . $params . "<br>";
