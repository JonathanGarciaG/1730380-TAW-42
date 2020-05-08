<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para insertar
$nombre = $_POST['nombre'];

//Consulta INSERT para insertar nuevo registro
$sql = "INSERT INTO categoria_fabricante(nombre) VALUES ('$nombre')";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: categoriasfabricantes.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>