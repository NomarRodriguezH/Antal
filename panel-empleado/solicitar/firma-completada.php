<?php 
   require_once "../../conex.php";
   session_start();
   if(!isset($_SESSION["login"]) ||  $_SESSION["login"] === false){
	header("location: ../../ingreso-empleado.php");    
	exit;}
   $idu= $_SESSION['id'];
   $res=mysqli_query($con, "SELECT nombre FROM empleados WHERE id ='$idu' ");
   $fila = mysqli_fetch_assoc($res);
   $nombre=$fila['nombre'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Firma Completada</title>
</head>
<body>
<div class="main">
	<div class="box">
		<h1>Haz Completado Tu Renuncia</h1>
		<p>Querido/a <b><?php echo $nombre ?></b>,

Quiero tomarme un momento para expresar mi gratitud por el tiempo que has pasado en nuestra empresa. Tus contribuciones y dedicación han sido verdaderamente valiosas para nosotros y nos sentimos afortunados de haber tenido la oportunidad de trabajar contigo.

Comprendo que la decisión de renunciar no ha sido fácil, pero aprecio que hayas tomado el tiempo para notificarnos y proporcionarnos una fecha efectiva de renuncia. Por favor, sepa que estamos aquí para apoyarlo/a en la transición y asegurarnos de que todo se maneje adecuadamente.

Pronto el equipo de recursos humanos se pondra en contacto con usted para finalizar el proceso de su renuncia.

Quiero desearle todo lo mejor en sus futuros emprendimientos y espero que se mantengan nuestros contactos en el futuro.

Atentamente,

Nomar RH - CEO de Antal</p>
	</div>
</div>
</body>
</html>