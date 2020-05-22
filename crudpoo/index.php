<?php
//se incluyen el archivo que realiza la conexion a la base de datos y el controlador
    require_once('bd/conexion.php');
    require_once('controlador/estudiante_controller.php');

    //se crea una nueva instancia del controlador
    $controller= new estudiante_controller();
    
    //se toma como un request al controlador las variables con nombre "m"
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {//verifica que exista un metodo con nombre de la solicitud(request) al controlador
            $controller->$metodo();//si existe se ejecuta el metodo
        }else{
            $controller->index();//si no se ejecuta el index
        }
    }else{//si no hay ninguna solicitud al controlador se llama al metodo index que lleva a la pagina principal del sistema
        $controller->index();
    }




?>