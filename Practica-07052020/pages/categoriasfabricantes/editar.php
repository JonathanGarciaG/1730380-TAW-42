<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para actualizar
$nombre = $_POST['nombre'];
$id = $_GET['id'];

//Consulta UPDATE para actualizar registro
$sql = "UPDATE categoria_fabricante SET nombre = '$nombre' WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: categoriasfabricantes.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>