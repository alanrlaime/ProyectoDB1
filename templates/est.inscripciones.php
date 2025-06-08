<?php
include('conexionDB.php');

if (!isset($_SESSION['ci'])) {
    die("Error: No hay un estudiante autenticado.");
}

$ci = intval($_SESSION['ci']);

// Obtener matrícula
$sqlMatricula = "SELECT Matricula FROM ESTUDIANTE WHERE CI = $ci";
$resMatricula = $conexion->query($sqlMatricula);
$matriculaRow = $resMatricula->fetch_assoc();

if (!$matriculaRow) {
    die("Error: Este usuario no es un estudiante.");
}

$matricula = $matriculaRow['Matricula'];

// Obtener materias disponibles que aún no está inscrito
$sqlDisponibles = "
SELECT M.ID_Materia, M.Nombre AS Materia, M.Semestre, C.Nombre AS Carrera
FROM MATERIA M
JOIN TIENE T ON T.ID_Materia = M.ID_Materia
JOIN CARRERA C ON C.ID_Carrera = T.ID_Carrera
WHERE T.ID_Carrera IN (
    SELECT T.ID_Carrera
    FROM ESTUDIANTE E
    JOIN INSCRITO I ON I.Matricula = E.Matricula
    JOIN TIENE T ON T.ID_Materia = I.ID_Materia
    WHERE E.Matricula = $matricula
)
AND M.ID_Materia NOT IN (
    SELECT ID_Materia FROM INSCRITO WHERE Matricula = $matricula
)
ORDER BY M.Semestre ASC
";

$result = $conexion->query($sqlDisponibles);

echo "<h2>Inscripción a Nuevas Materias</h2>";
echo "<form method='POST'>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Seleccionar</th><th>Materia</th><th>Semestre</th><th>Carrera</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td><input type='checkbox' name='materias[]' value='{$row['ID_Materia']}'></td>";
    echo "<td>{$row['Materia']}</td>";
    echo "<td>{$row['Semestre']}</td>";
    echo "<td>{$row['Carrera']}</td>";
    echo "</tr>";
}

echo "</table>";
echo "<input type='submit' name='inscribir' value='Inscribirse'>";
echo "</form>";

// Procesar inscripción
if (isset($_POST['inscribir']) && isset($_POST['materias'])) {
    foreach ($_POST['materias'] as $idMateria) {
        $idMateria = intval($idMateria);
        $conexion->query("INSERT INTO INSCRITO (Matricula, ID_Materia) VALUES ($matricula, $idMateria)");
    }
    echo "<p><strong>Inscripción realizada correctamente.</strong></p>";
    echo "<script>setTimeout(() => location.reload(), 1500);</script>";
}
?>
