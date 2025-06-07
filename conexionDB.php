<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_datos = 'seguimiento_academico';

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

echo "<script>console.log('Conexion')</script>";

?>