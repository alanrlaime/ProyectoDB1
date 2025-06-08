<?php

include('conexionDB.php');
session_start();

if ($_SESSION['Rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
$stmt = $conexion->prepare("SELECT * FROM usuario WHERE ID_U = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['Nombre'];
    $rol = $_POST['Rol'];

    if (!empty($_POST['Contrasena'])) {
        $contrasena = password_hash($_POST['Contrasena'], PASSWORD_DEFAULT);
        $stmt = $conexion->prepare("UPDATE usuario SET Nombre=?, Contrasena=?, Rol=? WHERE ID_U=?");
        $stmt->bind_param("sssi", $nombre, $contrasena, $rol, $id);
    } else {
        $stmt = $conexion->prepare("UPDATE usuario SET Nombre=?, Rol=? WHERE ID_U=?");
        $stmt->bind_param("ssi", $nombre, $rol, $id);
    }

    $stmt->execute();
    header("Location: ../index.php?p=inscripciones");
    exit;
}
?>

<h2>Editar Usuario</h2>
<form method="post">
    Nombre: <input type="text" name="Nombre" value="<?php echo $usuario['Nombre']; ?>" required><br>
    Nueva Contraseña (opcional): <input type="password" name="Contrasena"><br>
    Rol: 
    <select name="Rol">
        <option <?php if ($usuario['Rol'] == 'admin') echo 'selected'; ?>>admin</option>
        <option <?php if ($usuario['Rol'] == 'secretaria') echo 'selected'; ?>>secretaria</option>
        <option <?php if ($usuario['Rol'] == 'profesor') echo 'selected'; ?>>profesor</option>
        <option <?php if ($usuario['Rol'] == 'estudiante') echo 'selected'; ?>>estudiante</option>
    </select><br>
    <input type="submit" value="Actualizar">
</form>
