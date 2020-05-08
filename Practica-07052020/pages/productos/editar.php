<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para actualizar
$nombre = $_POST['nombre'];
$id = $_GET['id'];
$nombre = $_POST['nombre'];
$compra = $_POST['compra'];
$venta = $_POST['venta'];
$descripcion = $_POST['descripcion'];
$color = $_POST['color'];
$categoria = $_POST['categoria'];

$sql = "UPDATE productos SET nombre = '$nombre', precio_compra = '$compra', precio_venta = '$venta', descripcion = '$descripcion', color = '$color', categoria = '$categoria' WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: productos.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>