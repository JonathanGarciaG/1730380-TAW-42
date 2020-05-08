<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para insertar
$nombre = $_POST['nombre'];

//Sentencia INSERT para nuevo registro
$sql = "INSERT INTO categoria(nombre) VALUES ('$nombre')";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: categorias.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>