<?php
//clase para la conexion a la base de datos
 class Conexion{
 	public function conectar(){
 		$link = new PDO("mysql:host=127.0.0.1:3307;dbname=baseDatos","root","");
 		return $link;
 	}
 }
?>