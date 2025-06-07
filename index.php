<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Academico Universitario</title>
</head>
<body>

<?php
// Inicio de sesión y conexión a la base de datos
session_start();
require_once 'conexionDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Usuario'], $_POST['Clave'])) {
    $nombre = $_POST['Usuario'];
    $contrasena = $_POST['Clave'];

    $sql = "SELECT * FROM persona WHERE Usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();
        if ($contrasena === $fila['Clave']) {  // Validar la contraseña con password_verify, pero se requiere password_hash para almacenar contraseñas de forma segura
            $_SESSION['Usuario'] = $fila['Usuario'];
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>


<?php
 // Si se inicio sesion correctamente, mostrar el contenido del sitio
 if (isset($_SESSION['Usuario'])): ?>
    
    <header>
        <div class="nav">
            <div>
                <img src="img/logo.jpg" alt="logo-cea" class="img-max"><br>
                <a href="logout.php">Cerrar sesión</a>
            </div>
            <h3>Bienvenido, <?php echo htmlspecialchars($_SESSION['Usuario']); ?> </h3>
            
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

    <!-- Si no se ha iniciado sesión, mostrar el formulario de inicio de sesión -->
    <div class="login">
        <h2>Iniciar Sesión</h2>
            
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post" action="">
            <label>Nombre:</label> <br>
            <input type="text" name="Usuario" required><br>
            <label>Contraseña:</label> <br>
            <input type="password" name="Clave" required><br>
            <button type="submit">Entrar</button>
        </form>
    </div>
<?php endif; ?>

<?php
?>
