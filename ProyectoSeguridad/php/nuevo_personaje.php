<?php
// Conexión
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sp';

$conexion = new mysqli($host, $user, $password, $dbname); // ¡Esta línea faltaba!

if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}



$nombre = $_POST['nombre'];
$imagen = $_POST['imagen'];
$descripcion = $_POST['descripcion'];


$sql = "INSERT INTO personajes (nombre, imagen, descripcion) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre, $imagen, $descripcion);
$stmt->execute();


header("Location: ../PaginaPrincipal.php");
exit;
?>
