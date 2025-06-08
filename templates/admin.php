<?php
include('conexionDB.php');

$usuario = $_SESSION['usuario'];

// Conteo por rol
$roles = [
    "Estudiantes" => "SELECT COUNT(*) AS total FROM Estudiante",
    "Docentes" => "SELECT COUNT(*) AS total FROM Docente",
    "Directores" => "SELECT COUNT(*) AS total FROM Director_Carrera",
    "Administradores" => "SELECT COUNT(*) AS total FROM Administrador"
];

?>

<table border="1">
    <tr><th>Rol</th><th>Total Registrados</th></tr>
    <?php foreach ($roles as $rol => $sql) {
        $res = mysqli_query($conexion, $sql);
        $count = mysqli_fetch_assoc($res)['total'];
        echo "<tr><td>$rol</td><td>$count</td></tr>";
    } ?>
</table>
