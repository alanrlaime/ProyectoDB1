<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Academico Universitario</title>
    <link rel="stylesheet" href="styles/login.style.css">
</head>
<body>

<?php
 // Si se inicio sesion correctamente, mostrar el contenido del sitio
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 if (isset($_SESSION['Rol'])): ?>
    
    <header>
    <div class="user-info">
        <img src="public/logo.png" alt="logo" class="img-max" width="100"><br>
        <div>
            <h3>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre'])?> (<?php echo htmlspecialchars($_SESSION['Rol'])?>)</h3>
            <a href="templates/cruds/editar-perfil.php?ci=<?php echo $_SESSION['ci']?>">Editar Perfil</a> <br>
            <a href="./logout.php">Cerrar sesión</a>
        </div>
    </div>
        <!-- Navegación, en ?p=nombreDeTemplateSinExtencion -->
    <?php
        require_once 'templates/paths.php';
    ?>
    <footer>
        <p>© 2023 Sistema Academico Universitario. Todos los derechos reservados.</p>
    </footer>
    </body>

    
    <?php else: ?>

    <!-- Si no se ha iniciado sesión, mostrar el formulario de inicio de sesión -->
        <div class="form">
            <form action="validar.php" method="post" autocomplete="off" novalidate>
    <h1>Iniciar Sesión</h1>

    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" required autocomplete="username" />

    <label for="contraseña">Contraseña</label>
    <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required autocomplete="current-password" />

    <input type="submit" value="Ingresar" />
  </form>
        </div>
<?php endif; ?>

<?php
?>
