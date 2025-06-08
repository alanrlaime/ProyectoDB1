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
 if (isset($_SESSION['nombre'])): ?>
    
    <header>
        <div class="nav">
            <div>
                <img src="img/logo.jpg" alt="logo-cea" class="img-max"><br>
                <a href="./logout.php">Cerrar sesión</a>
            </div>
            <h3>Bienvenido, <?php echo htmlspecialchars($_SESSION['User']); ?> </h3>
            
        <!-- Navegación, en ?p=nombreDeTemplateSinExtencion -->
        <ul class="enlaces">
            <li><a href="?p=initial">Inicio</a></li>
            <li><a href="?p=tec">Materias</a></li>
            <li><a href="?p=hum">Docentes</a></li>
            <li><a href="?p=inscripciones">Inscripciones</a></li>
        </ul>
    </div>
    </header>
    <?php
        // Cargar la plantilla según el parámetro 'p' en la URL

        $paginas = isset($_GET['p']) ? strtolower($_GET['p']) : 'Pages';
        if($paginas == 'Pages'){
            require_once 'templates/paths.php';
        } else {
            require_once 'templates/'.$paginas.'.php';
        }
    ?>
    <footer>
        <p>© 2023 Sistema Academico Universitario. Todos los derechos reservados.</p>
    </footer>
    </body>

    
    <?php else: ?>

    <!-- Si no se ha iniciado sesión, mostrar el formulario de inicio de sesión -->
        <form action="validar.php" method="post" autocomplete="off" novalidate>
    <h1>Iniciar Sesión</h1>

    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" required autocomplete="username" />

    <label for="contraseña">Contraseña</label>
    <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required autocomplete="current-password" />

    <input type="submit" value="Ingresar" />
  </form>
<?php endif; ?>

<?php
?>
