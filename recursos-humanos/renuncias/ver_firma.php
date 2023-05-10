<?php
require_once '../../conex.php';

$id = $_GET['id'];
$sql = "SELECT * FROM renuncias_firma WHERE idU = '$id'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_assoc($resultado);
$nombre = $fila['idUnic'];
$tipo = 'application/pdf';
$contenido = $fila['firma'];
header('Content-Type: '.$tipo);
header('Content-Disposition: inline; filename="'.$nombre.'"');
echo base64_decode($contenido);
?>