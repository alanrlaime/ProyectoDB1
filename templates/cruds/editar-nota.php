<?php
include('../../conexionDB.php');

if (!isset($_GET['matricula']) || !isset($_GET['materia'])) {
    die("❌ Faltan parámetros necesarios.");
}

$matricula = intval($_GET['matricula']);
$materia_nombre = urldecode($_GET['materia']);

// Procesar actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nueva_nota = floatval($_POST['nota']);
    $update = "UPDATE INSCRITO 
               JOIN MATERIA ON INSCRITO.ID_Materia = MATERIA.ID_Materia 
               SET Nota = $nueva_nota 
               WHERE Matricula = $matricula AND MATERIA.Nombre = ?";
    
    $stmt = mysqli_prepare($conexion, $update);
    mysqli_stmt_bind_param($stmt, "s", $materia_nombre);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<p>✅ Nota actualizada correctamente.</p>";
        header("Location: ../../index.php?p=doc.calific");
        exit;
    } else {
        echo "❌ Error al actualizar o no se encontró la inscripción.";
    }
}

// Obtener datos actuales
$select = "
    SELECT P.Paterno, P.Materno, P.Nombre, I.Nota, M.Nombre AS Materia
    FROM INSCRITO I
    JOIN ESTUDIANTE E ON E.Matricula = I.Matricula
    JOIN PERSONA P ON P.CI = E.CI
    JOIN MATERIA M ON M.ID_Materia = I.ID_Materia
    WHERE I.Matricula = $matricula AND M.Nombre = ?
";

$stmt = mysqli_prepare($conexion, $select);
mysqli_stmt_bind_param($stmt, "s", $materia_nombre);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("❌ No se encontraron datos del estudiante.");
}
?>

<h3>Editar Nota</h3>
<p><strong>Estudiante:</strong> <?= $data['Paterno'] . ' ' . $data['Materno'] . ' ' . $data['Nombre'] ?></p>
<p><strong>Materia:</strong> <?= $data['Materia'] ?></p>

<form method="POST">
    <label for="nota">Nueva Nota:</label>
    <input type="number" name="nota" id="nota" min="0" max="100" step="0.01" value="<?= $data['Nota'] ?>" required>
    <br><br>
    <button type="submit">Guardar Cambios</button>
</form>
