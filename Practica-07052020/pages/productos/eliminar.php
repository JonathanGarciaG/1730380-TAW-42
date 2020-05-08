<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo el id de el registro a eliminar
$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: productos.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>