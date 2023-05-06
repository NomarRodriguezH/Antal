<?php  
 	session_start();
   if(!isset($_SESSION["login"]) ||  $_SESSION["login"] === false){
	header("location: ../ingreso-empleado.php");    
	exit;
   }
	echo $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel Empleado</title>
</head>
<body>
<div class="main">
	<div class="box">
		<a href="reporte/"><div class="1">Reportar Incidente</div></a>
		<a href="proyectos/"><div class="2">Mis proyectos asignados</div></a>
		<a href="solicitar/"><div class="3">Solicitar</div></a>

	</div>
</div>
</body>
</html>