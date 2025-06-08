<?php
include('conexionDB.php');


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
          ORDER BY M.Nombre, PA.Letra, PE.Paterno";

$result = mysqli_query($conexion, $query);
?>


<h3>Estudiantes Inscritos en sus Materias</h3>
<table border="1">
    <tr>
        <th>Materia</th>
        <th>Estudiante</th>
        <th>Matrícula</th>
        <th>Paralelo</th>
        <th>Aula</th>
        <th>Nota</th>
        <th>Calificar</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['Materia'] ?></td>
        <td><?= $row['Paterno'] . ' ' . $row['Materno'] . ' ' . $row['EstudianteNombre'] ?></td>
        <td><?= $row['Matricula'] ?></td>
        <td><?= $row['Paralelo'] ?></td>
        <td><?= $row['Aula'] ?></td>
        <td><?= $row['Nota'] ?></td>
        <td>
    <a href="templates/cruds/editar-nota.php?matricula=<?= $row['Matricula'] ?>&materia=<?= urlencode($row['Materia']) ?>">✏️</a>
</td>

    </tr>
    <?php } ?>
</table>
