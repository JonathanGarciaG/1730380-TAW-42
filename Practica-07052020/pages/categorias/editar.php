<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para actualizar
$nombre = $_POST['nombre'];
$id = $_GET['id'];

//Sentencia UPDATE para actualizar registro
$sql = "UPDATE categoria SET nombre = '$nombre' WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: categorias.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>