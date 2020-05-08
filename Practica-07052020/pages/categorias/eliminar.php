<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo el id de el registro a eliminar
$id = $_GET['id'];

//Sentencia DELETE para eliminar registro
$sql = "DELETE FROM categoria WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    # "Consulta exitosa" Redirige a la tabla de categorias
    header('Location: categorias.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>