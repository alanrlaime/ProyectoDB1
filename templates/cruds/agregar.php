<?php
require_once '../../conexionDB.php';
session_start();

if ($_SESSION['Rol'] != 'Administrador') {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['Nombre'];
    $contrasena = $_POST['Contrasena']; // falta el hash
    $rol = $_POST['Rol'];

    $stmt = $conexion->prepare("INSERT INTO usuario (Nombre, Contrasena, Rol) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$nombre, $contrasena, $rol);
    $stmt->execute();

    header("Location: ../index.php?p=inscripciones");
    exit;
}
?>

<h2>Agregar Usuario</h2>
<form method="post">
    Nombre: <input type="text" name="Nombre" required><br>
    Contraseña: <input type="password" name="Contrasena" required><br>
    Rol: 
    <select name="Rol">
        <option>admin</option>
        <option>secretaria</option>
        <option>profesor</option>
        <option>estudiante</option>
    </select><br>
    <input type="submit" value="Guardar">
</form>
