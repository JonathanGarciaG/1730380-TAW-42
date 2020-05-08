<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo el id de el registro a eliminar
$id = $_GET['id'];

//Realizando la consulta de eliminacion DELETE del registro
$sql = "DELETE FROM categoria_fabricante WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: categoriasfabricantes.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>