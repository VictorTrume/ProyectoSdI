<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sp';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexion: " . $conn->connect_error);
}

if (isset($_POST['registro'])) {
    // Escapar entradas para evitar inyección SQL
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $contraseña = $conn->real_escape_string($_POST['contraseña']);
    $telefono = $conn->real_escape_string($_POST['telefono']);

    // Validar teléfono: 7 dígitos numéricos
    if (!preg_match('/^\d{7}$/', $telefono)) {
        die("El teléfono debe contener exactamente 7 dígitos numéricos.");
    }

    // Crear el hash de la contraseña
    $contraseña_hash = password_hash($contraseña, PASSWORD_BCRYPT);

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, contraseña, telefono) VALUES ('$nombre', '$email', '$contraseña_hash', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "<a href='../Index.html'>Registro exitoso, inicie sesión</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
