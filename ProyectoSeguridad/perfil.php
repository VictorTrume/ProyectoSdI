<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: Index.html");
    exit();
}

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sp';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$email = $conn->real_escape_string($_SESSION['email']);

$sql = "SELECT id, nombre, email, telefono FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "Usuario no encontrado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Perfil de Usuario</title>

    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="stylesheet" href="css/estilo2.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .content-wrapper {
        max-width: 500px;
        margin: 80px auto 40px auto;
        padding: 0 15px;
    }

    h2.title {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
        font-weight: 700;
        font-size: 2rem;
    }

    .profile {
        background: #fff;
        width: 100%;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        overflow-wrap: break-word;
        word-wrap: break-word;
        word-break: break-word;
    }

    .profile-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e0e0e0;
        font-size: 1.2rem;
        color: #444;
        flex-wrap: wrap;
    }

    .profile-item .label {
        font-weight: bold;
        color: #222;
        margin-right: 10px;
        flex: 1 1 40%;
    }

    .profile-item span:last-child {
        flex: 1 1 55%;
        word-break: break-word;
    }

  
</style>


</head>

<body>

<header>
  <div class="nav container">
    <a href="PaginaPrincipal.php" class="logo">South Park</a>
    <div class="dropdown">
      <button class="dropbtn">Menú ▼</button>
      <div class="dropdown-content">
        <a href="PaginaPrincipal.php">Inicio</a>
        <a href="NPersonaje.php">Añadir Personaje</a>
        <a href="perfil.php">Perfil</a>
        <a href="Index.html">Salir</a>
      </div>
    </div>
  </div>
</header>

<div class="content-wrapper">
  <h2 class="title">Perfil de Usuario</h2>

  <div class="profile" role="main" aria-label="Perfil de usuario">
      <div class="profile-item"><span class="label">ID:</span> <span><?= htmlspecialchars($user['id']) ?></span></div>
      <div class="profile-item"><span class="label">Nombre:</span> <span><?= htmlspecialchars($user['nombre']) ?></span></div>
      <div class="profile-item"><span class="label">Correo:</span> <span><?= htmlspecialchars($user['email']) ?></span></div>
      <div class="profile-item"><span class="label">Teléfono:</span> <span><?= htmlspecialchars($user['telefono']) ?></span></div>
  </div>
</div>


<footer>
  <span class="copyright">South Park es propiedad de Viacom...</span>
</footer>

</body>
</html>
