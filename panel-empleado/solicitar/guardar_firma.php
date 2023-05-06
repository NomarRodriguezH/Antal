<?php 
require_once "../../conex.php";
session_start();
$idu=$_SESSION['id'];
$idunic= uniqid('firma_');
$firma = $_POST['firma'];
$binario = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $firma));

// Conexión a la base de datos

// Preparar la consulta SQL
$stmt = $con->prepare("INSERT INTO renuncias_firma (idUnic, idU, firma) VALUES (?, ?, ?)");

// Asociar el parámetro
$stmt->bind_param("ssb", $idunic, $idu, $blob);

// Enviar datos largos
$null = null;
$stmt->send_long_data(2, $binario);

$stmt->execute();
$stmt->close();
$con->close();

if ($stmt) {
	$res=mysqli_query($con, "UPDATE renuncias SET status='2' WHERE idu ='$idu' ");
	if ($res) {
		header("location: firma-completada.php");
	}
}
?>
