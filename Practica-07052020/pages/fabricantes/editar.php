<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para actualizar
$id = $_GET['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$categoria = $_POST['categoria'];

//Sentencia UPDATE para actualizar registro
$sql = "UPDATE fabricante SET nombre_fabricante = '$nombre', correo = '$correo', direccion = '$direccion', categoria = '$categoria' WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: fabricantes.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>