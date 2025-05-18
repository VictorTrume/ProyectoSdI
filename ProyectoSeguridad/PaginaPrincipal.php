<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sp");
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blog</title>
  <link rel="stylesheet" href="css/estilo.css" />
  <link rel="stylesheet" href="css/estilo2.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <style>
    /* Ocultar checkbox */
    .toggle {
      display: none;
    }

    /* Texto limitado inicialmente a 3 líneas */
    .post-description {
      font-size: 0.9em;
      line-height: 1.5rem;
      margin: 5px 0 10px;

      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }

    /* Cuando toggle está activo mostramos todo el texto */
    .toggle:checked ~ .post-description {
      display: block;
      overflow: visible;
      -webkit-line-clamp: unset;
      max-height: none;
    }

    /* Estilos del botón ver más / ver menos */
    .read-more-label {
      color: #007bff;
      cursor: pointer;
      font-weight: bold;
      margin-left: 5px;
      display: inline-block;
      user-select: none;
    }

    .read-more-label::after {
      content: " Ver más";
    }

    .toggle:checked ~ .read-more-label::after {
      content: " Ver menos";
    }

    /* Tus estilos existentes */
    .post-box {
      background: var(--bg-color);
      box-shadow: 0 4px 14px hsl(355deg 25% 15% / 10%);
      padding: 15px;
      border-radius: 0.5rem;
      margin-bottom: 20px;
    }

    .post-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      object-position: center;
      border-radius: 0.5rem;
    }
  </style>
</head>

<body>
<!-- Header -->
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

<!-- Imagen de fondo -->
<section class="home" id="home">
  <div class="home-text container">
    <img src="img/SPbck.jpg" alt="Fondo">
  </div>
</section>

<!-- Publicaciones -->
<section class="post container">
<?php
$sql = "SELECT * FROM personajes ORDER BY id DESC";
$result = $conexion->query($sql);

while ($row = $result->fetch_assoc()):
?>
  <div class="post-box">
    <img src="<?= htmlspecialchars($row['imagen']) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>" class="post-img" />
    <h3><?= htmlspecialchars($row['nombre']) ?></h3>

    <!-- Checkbox toggle -->
    <input type="checkbox" id="toggle<?= $row['id'] ?>" class="toggle" />
    
    <!-- Texto de descripción -->
    <p class="post-description">
      <?= nl2br(htmlspecialchars($row['descripcion'])) ?>
    </p>

    <!-- Label para activar el checkbox -->
    <label for="toggle<?= $row['id'] ?>" class="read-more-label"></label>
  </div>
<?php endwhile; ?>
</section>

<!-- Footer -->
<footer>
  <div class="icon"><a href="#" class="social-icon"></a></div>
  <span class="copyright">South Park es propiedad de Viacom...</span>
</footer>
</body>
</html>
