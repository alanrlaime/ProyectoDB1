<?php
session_start();
include('../conexionDB.php');

$usuario = $_SESSION['usuario'];

// Conteo por rol
$roles = [
    "Estudiantes" => "SELECT COUNT(*) AS total FROM Estudiante",
    "Docentes" => "SELECT COUNT(*) AS total FROM Docente",
    "Directores" => "SELECT COUNT(*) AS total FROM Director_Carrera",
    "Administradores" => "SELECT COUNT(*) AS total FROM Administrador"
];

?>

<h2>Bienvenido Administrador</h2>
<!-- Botón de Cerrar Sesión -->
<div style="text-align: right; margin: 20px;">
    <form action="../logout.php" method="post">
        <button type="submit" style="padding: 10px 20px; background-color: #c0392b; color: white; border: none; border-radius: 8px; cursor: pointer;">
            Cerrar Sesión
        </button>
    </form>
</div>

<table border="1">
    <tr><th>Rol</th><th>Total Registrados</th></tr>
    <?php foreach ($roles as $rol => $sql) {
        $res = mysqli_query($conexion, $sql);
        $count = mysqli_fetch_assoc($res)['total'];
        echo "<tr><td>$rol</td><td>$count</td></tr>";
    } ?>
</table>
