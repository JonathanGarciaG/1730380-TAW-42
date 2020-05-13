<?php
//En el index mostraremos las salidas de las vistas al usuario y atraves de el enviaremos las distintas aciones que el usuario envie al controlador

//invocacion a los metodos
require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "models/crudProd.php";

//Controlador
//Creacion de los objetos, que es la logica del negocio
require_once "controllers/controller.php";

//muestra la funcion o metodo "pagina" que se encuentra en controllers/controller.php
$mvc->pagina();

?>