<?php
// Conexión a la base de datos


$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sp';

$conexion = new mysqli($host, $user, $password, $dbname); // ¡Esta línea faltaba!

if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>South Park - Personajes</title>
  <link rel="stylesheet" href="css/estilo.css">
   <link rel="stylesheet" href="css/estilo2.css">
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
<br>
<br>
<br>
<style>
.form-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 40px;
  padding: 20px;
  flex-wrap: nowrap;
}

.side-image {
  width: 180px;
  height: auto;
  object-fit: contain;
}

.form-content {
  max-width: 400px;
  width: 100%;
  background-color: #f4f4f4;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.form-content form {
  display: flex;
  flex-direction: column;
}

.form-content input,
.form-content textarea,
.form-content button {
  margin-bottom: 15px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 8px;
}

.form-content button {
  background-color: #ffcc00;
  color: #000;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-content button:hover {
  background-color: #ffaa00;
}
</style>

<section class="container form-section">
  <div class="form-wrapper">
    <!-- Imagen izquierda -->
    <img src="img/but1.png" alt="Personaje Izquierda" class="side-image">

    <!-- Formulario centrado -->
    <div class="form-content">
      <h2 style="text-align: center;">Añadir Personaje</h2>
      <form action="php/nuevo_personaje.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del personaje" required>
        <input type="text" name="imagen" placeholder="URL de la imagen" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>
        <button type="submit">Añadir Personaje</button>
      </form>
    </div>

    <!-- Imagen derecha (opcional, puedes quitarla si no la quieres) -->
    <!-- <img src="img/derecha.png" alt="Personaje Derecha" class="side-image"> -->
  </div>
</section>


<footer>
  <div class="icon"></div>
  <span class="copyright">South Park es propiedad de Viacom...</span>
</footer>
</body>
</html>
