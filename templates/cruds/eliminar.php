<?php
require_once '../../conexionDB.php';
session_start();

if ($_SESSION['Rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];

$stmt = $conexion->prepare("DELETE FROM usuario WHERE ID_U = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../index.php?p=inscripciones");
exit;
