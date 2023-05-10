<?php  
 	session_start();
   if(!isset($_SESSION["Sid"])){
	header("location: ../login.php");    
	exit;
   }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel Soporte</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		.main {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.box {
			width: 500px;
			background-color: #fff;
			padding: 40px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
		}
		.box h1 {
			margin-bottom: 40px;
			text-align: center;
			font-size: 2.5rem;
			font-weight: bold;
		}
		.uno, .dos, .tres, .cuatro {
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<div class="main">
		<div class="box">
			<h1>Bienvenido , <?php echo $_SESSION['Suser'];?></h1>
			<div class="uno"><a href="formulario-de-contacto/" class="btn btn-primary btn-block">Formulario De Contacto</a></div>
			<div class="dos"><a href="quejas/" class="btn btn-danger btn-block">Quejas</a></div>
			<div class="tres"><a href="faqs/" class="btn btn-warning btn-block">FAQs</a></div>
			
			<center><a style="text-align: center;" href="../cerrar-sesion.php">Cerrar sesión</a>	</center>		
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
