<?php
include('conexionDB.php');

if (!isset($_SESSION['ci'])) {
    die("Error: No hay un usuario autenticado.");
}

$ci = intval($_SESSION['ci']);

// Obtener matrícula del estudiante
$sqlMatricula = "SELECT Matricula FROM ESTUDIANTE WHERE CI = $ci";
$resMatricula = $conexion->query($sqlMatricula);
$matriculaRow = $resMatricula->fetch_assoc();

if (!$matriculaRow) {
    die("Error: Este usuario no está registrado como estudiante.");
}

$matricula = $matriculaRow['Matricula'];

// Obtener datos personales
$sqlDatos = "SELECT Nombre, Paterno, Materno FROM PERSONA WHERE CI = $ci";
$datos = $conexion->query($sqlDatos)->fetch_assoc();

echo "<h2>Historial Académico de: {$datos['Nombre']} {$datos['Paterno']} {$datos['Materno']}</h2>";
echo "<p>Matrícula: $matricula</p>";
?>

<table border="1" cellpadding="5">
    <tr>
        <th>Materia</th>
        <th>Semestre</th>
        <th>Carrera</th>
        <th>Docente</th>
        <th>Nota</th>
    </tr>
    <?php
    $historialSQL = "
        SELECT 
            M.Nombre AS Materia,
            M.Semestre,
            C.Nombre AS Carrera,
            P2.Nombre AS Docente,
            I.Nota
        FROM INSCRITO I
        JOIN MATERIA M ON M.ID_Materia = I.ID_Materia
        JOIN TIENE T ON T.ID_Materia = M.ID_Materia
        JOIN CARRERA C ON C.ID_Carrera = T.ID_Carrera
        LEFT JOIN IMPARTE IM ON IM.ID_Materia = M.ID_Materia
        LEFT JOIN DOCENTE D ON D.ID_Docente = IM.ID_Docente
        LEFT JOIN PERSONA P2 ON P2.CI = D.CI
        WHERE I.Matricula = $matricula
    ";

    $result = $conexion->query($historialSQL);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Materia']}</td>";
        echo "<td>{$row['Semestre']}</td>";
        echo "<td>{$row['Carrera']}</td>";
        echo "<td>" . ($row['Docente'] ?? 'No asignado') . "</td>";
        echo "<td>" . ($row['Nota'] !== null ? $row['Nota'] : 'Pendiente') . "</td>";
        echo "</tr>";
    }
    ?>
</table>
