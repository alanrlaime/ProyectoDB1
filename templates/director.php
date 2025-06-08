<?php
session_start();
include('../conexionDB.php');

$usuario = $_SESSION['usuario'];

$query = "SELECT M.Nombre AS Materia, M.Semestre, D.Profesion, P2.Nombre AS Docente
          FROM Persona P
          JOIN Director_Carrera DC ON P.CI = DC.CI
          JOIN Carrera C ON DC.ID_Director = C.ID_Director
          JOIN Materia M ON C.ID_Carrera = M.ID_Carrera
          LEFT JOIN Imparte I ON M.ID_Materia = I.ID_Materia
          LEFT JOIN Docente D ON I.ID_Docente = D.ID_Docente
          LEFT JOIN Persona P2 ON D.CI = P2.CI
          WHERE P.Usuario = '$usuario'";

$result = mysqli_query($conexion, $query);
?>

<h2>Bienvenido Director de Carrera</h2>
<!-- Botón de Cerrar Sesión -->
<div style="text-align: right; margin: 20px;">
    <form action="../logout.php" method="post">
        <button type="submit" style="padding: 10px 20px; background-color: #c0392b; color: white; border: none; border-radius: 8px; cursor: pointer;">
            Cerrar Sesión
        </button>
    </form>
</div>

<table border="1">
    <tr>
        <th>Materia</th><th>Semestre</th><th>Docente</th><th>Profesión</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['Materia'] ?></td>
        <td><?= $row['Semestre'] ?></td>
        <td><?= $row['Docente'] ?? 'Sin asignar' ?></td>
        <td><?= $row['Profesion'] ?? '-' ?></td>
    </tr>
    <?php } ?>
</table>
