<?php
session_start();
include('conexionDB.php'); // Asegúrate de que este archivo existe y se conecta correctamente a tu BD

$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$clave = mysqli_real_escape_string($conexion, $_POST['contraseña']);

// Buscar usuario en la tabla Persona
$sql = "SELECT * FROM Persona WHERE Usuario = '$usuario' AND Clave = '$clave'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $persona = mysqli_fetch_assoc($resultado);
    $ci = $persona['CI'];

    $_SESSION['usuario'] = $usuario;
    $_SESSION['nombre'] = $persona['Nombre'];
    $_SESSION['ci'] = $ci;

    // Detectar el rol según CI
    if (mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM Estudiante WHERE CI = '$ci'")) > 0) {
        $_SESSION['Rol'] = 'Estudiante';
    } elseif (mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM Docente WHERE CI = '$ci'")) > 0) {
        $_SESSION['Rol'] = 'Docente';
    } elseif (mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM Director_Carrera WHERE CI = '$ci'")) > 0) {
        $_SESSION['Rol'] = 'Director';
    } elseif (mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM Administrador WHERE CI = '$ci'")) > 0) {
        $_SESSION['Rol'] = 'Administrador';
    } else {
        echo "Rol no identificado.";
    }
    header("Location: index.php");

    exit();
} else {
    include("index.php");
    ?>
    <h1 id="error-message" style="
        background-color: red;
        color: white;
        padding: 10px;
        text-align: center;
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 8px;
    ">
        Usuario o contraseña incorrectos
    </h1>
    <script>
        setTimeout(() => {
            const msg = document.getElementById('error-message');
            if (msg) msg.style.opacity = '0';
        }, 3000);
    </script>
    <?php
}
mysqli_close($conexion);
?>
