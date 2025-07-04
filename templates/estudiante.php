<?php
include('conexionDB.php');

$usuario = $_SESSION['usuario'];

$query = "SELECT P.Nombre, P.Paterno, P.Materno, M.Nombre AS Materia, A.Numero AS Aula, PA.Letra AS Paralelo, I.Nota
          FROM Persona P
          JOIN Estudiante E ON P.CI = E.CI
          JOIN Inscrito I ON E.Matricula = I.Matricula
          JOIN Materia M ON I.ID_Materia = M.ID_Materia
          JOIN Contiene C ON M.ID_Materia = C.ID_Materia
          JOIN Paralelo PA ON C.ID_Paralelo = PA.ID_Paralelo
          JOIN Aula A ON PA.ID_Aula = A.ID_Aula
          WHERE P.Usuario = '$usuario'";

$result = mysqli_query($conexion, $query);
?>

<table border="1">
    <tr>
        <th>Materia</th><th>Aula</th><th>Paralelo</th><th>Nota</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['Materia'] ?></td>
        <td><?= $row['Aula'] ?></td>
        <td><?= $row['Paralelo'] ?></td>
        <td><?= $row['Nota'] ?></td>
    </tr>
    <?php } ?>
</table>
