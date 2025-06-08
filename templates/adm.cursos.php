<?php
// vistas/adm/cursos.php
include('conexionDB.php'); 

// ELIMINAR CURSO
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conexion->query("DELETE FROM CARRERA WHERE ID_Carrera = $id");
    header("Location: ?p=adm.cursos");
}
?>

<h2>Gestión de Carreras</h2>
<a href="?p=cruds/cruds-admi">Nueva Carrera</a>

<!-- TABLA ACTUALIZADA -->
<table border="1" cellpadding="5">
    <tr>
        <th>ID Carrera</th>
        <th>Nombre</th>
        <th>Duración</th>
        <th>Director</th>
        <th>Materias</th>
        <th>Docentes</th>
        <th>Acciones</th>
    </tr>
    <?php
    $result = $conexion->query("
        SELECT C.*, P.Nombre AS Director 
        FROM CARRERA C 
        JOIN DIRECTOR_CARRERA D ON C.ID_Director = D.ID_Director 
        JOIN PERSONA P ON P.CI = D.CI
    ");
    while ($curso = $result->fetch_assoc()) {
        $id = $curso['ID_Carrera'];
        echo "<tr>";
        echo "<td>{$curso['ID_Carrera']}</td>";
        echo "<td>{$curso['Nombre']}</td>";
        echo "<td>{$curso['Duracion']}</td>";
        echo "<td>{$curso['Director']}</td>";

        // Materias
        $materias = $conexion->query("SELECT Nombre FROM MATERIA WHERE ID_Carrera = $id");
        echo "<td><ul>";
        while ($mat = $materias->fetch_assoc()) {
            echo "<li>{$mat['Nombre']}</li>";
        }
        echo "</ul></td>";

        // Docentes
        $docentes = $conexion->query("
            SELECT DISTINCT P.Nombre 
            FROM IMPARTE I 
            JOIN MATERIA M ON M.ID_Materia = I.ID_Materia 
            JOIN TIENE T ON T.ID_Materia = M.ID_Materia 
            JOIN DOCENTE D ON D.ID_Docente = I.ID_Docente 
            JOIN PERSONA P ON P.CI = D.CI 
            WHERE T.ID_Carrera = $id
        ");
        echo "<td><ul>";
        while ($doc = $docentes->fetch_assoc()) {
            echo "<li>{$doc['Nombre']}</li>";
        }
        echo "</ul></td>";

        echo "<td>
            <a href='?p=cruds/cruds-admi&id={$curso['ID_Carrera']}'>Editar</a> |
            <a href='?p=adm.cursos&delete={$curso['ID_Carrera']}' onclick=\"return confirm('¿Eliminar este curso?')\">Borrar</a>
        </td>";
        echo "</tr>";
    }
    ?>
</table>