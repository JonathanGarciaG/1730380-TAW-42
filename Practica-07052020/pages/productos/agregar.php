<?php
#Conectando a la base de datos
include ('../includes/conexion.php');

#Obteniendo los datos para insertar
$nombre = $_POST['nombre'];
$compra = $_POST['compra'];
$venta = $_POST['venta'];
$descripcion = $_POST['descripcion'];
$color = $_POST['color'];
$categoria = $_POST['categoria'];

$sql = "INSERT INTO productos(nombre,precio_compra,precio_venta,descripcion,color,categoria) VALUES ('$nombre','$compra','$venta','$descripcion','$color','$categoria')";

if (mysqli_query($conn, $sql)) {
    #echo "Consulta exitosa";
    header('Location: productos.php');
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>