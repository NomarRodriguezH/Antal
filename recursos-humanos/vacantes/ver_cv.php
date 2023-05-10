<?php
$conexion = mysqli_connect('localhost', 'root', '', 'antal_db');

$id = $_GET['id'];
$sql = "SELECT * FROM vacantes_postulaciones WHERE id = '$id'";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
$nombre = $fila['nombre_archivo'];
$tipo = $fila['tipo_archivo'];
$contenido = $fila['contenido_archivo'];
header('Content-Type: '.$tipo);
header('Content-Disposition: inline; filename="'.$nombre.'"');
echo base64_decode($contenido);
?>