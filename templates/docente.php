<?php
session_start();
include('../conexionDB.php');

$usuario = $_SESSION['usuario'];

// Obtener el CI del docente
$queryCI = "SELECT D.ID_Docente
            FROM Persona P
            JOIN Docente D ON P.CI = D.CI
            WHERE P.Usuario = '$usuario'";
$resultCI = mysqli_query($conexion, $queryCI);
$rowCI = mysqli_fetch_assoc($resultCI);

if (!$rowCI) {
    echo "<h2>Error: Docente no encontrado.</h2>";
    exit;
}

$id_docente = $rowCI['ID_Docente'];

// Obtener las materias que imparte y los estudiantes inscritos
$query = "SELECT M.Nombre AS Materia, E.Matricula, PE.Nombre AS EstudianteNombre, PE.Paterno, PE.Materno, PA.Letra AS Paralelo, A.Numero AS Aula, I.Nota
          FROM Imparte IM
          JOIN Materia M ON IM.ID_Materia = M.ID_Materia
          JOIN Inscrito I ON M.ID_Materia = I.ID_Materia
          JOIN Estudiante E ON I.Matricula = E.Matricula
          JOIN Persona PE ON E.CI = PE.CI
          JOIN Contiene C ON M.ID_Materia = C.ID_Materia
          JOIN Paralelo PA ON C.ID_Paralelo = PA.ID_Paralelo
          JOIN Aula A ON PA.ID_Aula = A.ID_Aula
          WHERE IM.ID_Docente = '$id_docente'
          ORDER BY M.Nombre, PA.Letra, PE.Paterno";

$result = mysqli_query($conexion, $query);
?>

<h2>Bienvenido Docente</h2>
<!-- Botón de Cerrar Sesión -->
<div style="text-align: right; margin: 20px;">
    <form action="../logout.php" method="post">
        <button type="submit" style="padding: 10px 20px; background-color: #c0392b; color: white; border: none; border-radius: 8px; cursor: pointer;">
            Cerrar Sesión
        </button>
    </form>
</div>

<h3>Estudiantes Inscritos en sus Materias</h3>
<table border="1">
    <tr>
        <th>Materia</th>
        <th>Estudiante</th>
        <th>Matrícula</th>
        <th>Paralelo</th>
        <th>Aula</th>
        <th>Nota</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['Materia'] ?></td>
        <td><?= $row['Paterno'] . ' ' . $row['Materno'] . ' ' . $row['EstudianteNombre'] ?></td>
        <td><?= $row['Matricula'] ?></td>
        <td><?= $row['Paralelo'] ?></td>
        <td><?= $row['Aula'] ?></td>
        <td><?= $row['Nota'] ?></td>
    </tr>
    <?php } ?>
</table>
