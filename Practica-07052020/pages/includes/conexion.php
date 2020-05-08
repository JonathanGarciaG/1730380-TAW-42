<?php
//Conexion al servidor local en el puerto 3307 de mysql
$conn = new mysqli('localhost:3307',  'root', '','tecweb');
if($conn->connect_errno > 0){
    die('Unable to connect to database [' . $conn->connect_error . ']');
}
mysqli_query($conn,"SET NAMES 'utf8'");
?>

