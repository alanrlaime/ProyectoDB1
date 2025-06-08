<?php
include('conexionDB.php');

// Procesar formulario al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $duracion = $_POST['duracion'];
    $director = $_POST['director'];

    if ($id) {
        // EDITAR
        $stmt = $conexion->prepare("UPDATE CARRERA SET Nombre = ?, Duracion = ?, ID_Director = ? WHERE ID_Carrera = ?");
        $stmt->bind_param("siii", $nombre, $duracion, $director, $id);
    } else {
        // CREAR
        $stmt = $conexion->prepare("INSERT INTO CARRERA (Nombre, Duracion, ID_Director) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $nombre, $duracion, $director);
    }

    $stmt->execute();
    header("Location: ?p=adm.cursos");
    exit;
}

// Obtener datos para edición
$curso = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = $conexion->query("SELECT * FROM CARRERA WHERE ID_Carrera = $id");
    $curso = $res->fetch_assoc();
}

// Obtener lista de directores
$directores = $conexion->query("SELECT D.ID_Director, P.Nombre FROM DIRECTOR_CARRERA D JOIN PERSONA P ON D.CI = P.CI");
?>

<h2><?= $curso ? 'Editar Curso' : 'Nuevo Curso' ?></h2>
<form method="POST">
    <?php if ($curso): ?>
        <input type="hidden" name="id" value="<?= $curso['ID_Carrera'] ?>">
    <?php endif; ?>
    <label>Nombre:</label>
    <input type="text" name="nombre" required value="<?= $curso['Nombre'] ?? '' ?>"><br>

    <label>Duración (semestres):</label>
    <input type="number" name="duracion" required value="<?= $curso['Duracion'] ?? '' ?>"><br>

    <label>Director:</label>
    <select name="director" required>
        <option value="">-- Seleccione --</option>
        <?php while ($dir = $directores->fetch_assoc()): ?>
            <option value="<?= $dir['ID_Director'] ?>" <?= (isset($curso) && $curso['ID_Director'] == $dir['ID_Director']) ? 'selected' : '' ?>>
                <?= $dir['Nombre'] ?>
            </option>
        <?php endwhile; ?>
    </select><br><br>

    <button type="submit">Guardar</button>
    <a href="?p=adm.cursos">Cancelar</a>
</form>
