<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para insertar
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$categoria = $_POST['categoria'];

//Consulta INSERT para insertar nuevo registro
$sql = "INSERT INTO fabricante(nombre_fabricante,direccion,correo,categoria) VALUES ('$nombre','$direccion','$correo','$categoria')";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: fabricantes.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>