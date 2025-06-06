<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Academico Universitario</title>
</head>
<body>

<?php
session_start();
require_once 'conexionDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nombre'], $_POST['Contrasena'])) {
    $nombre = $_POST['Nombre'];
    $contrasena = $_POST['Contrasena'];

    $sql = "SELECT * FROM usuario WHERE Nombre = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        if ($contrasena === $fila['Contrasena']) {  // Validar la contraseña con password_verify, pero se requiere password_hash para almacenar contraseñas de forma segura
            $_SESSION['Nombre'] = $fila['Nombre'];
            $_SESSION['Rol'] = $fila['Rol'];
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>


<?php if (isset($_SESSION['Nombre'])): ?>
    
    <header>
        <div class="nav">
            <div>
                <img src="img/logo.jpg" alt="logo-cea" class="img-max"><br>
                <a href="db-conections/logout.php">Cerrar sesión</a>
            </div>
            <h3>Bienvenido, <?php echo htmlspecialchars($_SESSION['Nombre']); ?> (<?php echo $_SESSION['Rol']; ?>)</h3>
            
            <img src="img/logo-min.png" alt="logo-min" class="img-min">
            
            <button><i class="fas fa-bars"></i></button>

        <ul class="enlaces">
            <li><a href="?p=initial">Inicio</a></li>
            <li><a href="?p=tec">Carreras Tecnicas</a></li>
            <li><a href="?p=hum">Humanidades</a></li>
            <li><a href="?p=inscripciones">Inscripciones</a></li>
            <li><a href="?p=Conv">Convocatorias</a></li>
            <li><a href="?p=comuni">Comunicacion</a></li>
        </ul>
    </div>
    </header>
    <?php

        $paginas = isset($_GET['p']) ? strtolower($_GET['p']) : 'Pages';
        if($paginas == 'Pages'){
            require_once 'templates/inicio.php';
        } else {
            require_once 'templates/'.$paginas.'.php';
        }
    ?>
    <footer>
        <p>© 2023 Sistema Academico Universitario. Todos los derechos reservados.</p>
    </footer>
    </body>

    
    <?php else: ?>
    <div class="login">
        <h2>Iniciar Sesión</h2>
            
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post" action="">
            <label>Nombre:</label> <br>
            <input type="text" name="Nombre" required><br>
            <label>Contraseña:</label> <br>
            <input type="password" name="Contrasena" required><br>
            <button type="submit">Entrar</button>
        </form>
    </div>
<?php endif; ?>

<?php
?>
