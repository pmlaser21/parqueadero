<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'parqueadero';

$conexion = new mysqli($hostname, $username, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
