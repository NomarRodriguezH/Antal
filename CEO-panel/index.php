<?php session_start(); 
if (!isset($_SESSION['RHuser'])) {
	header("location: ../login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel Recursos Humanos</title>
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
			<h1>Hola, <?php echo $_SESSION['RHuser'] ?> Gestiona el personal de la empresa</h1>
			<div class="uno"><a href="" class="btn btn-primary btn-block">Renuncias</a></div>
			<div class="dos"><a href="" class="btn btn-danger btn-block">Despidos</a></div>
			<div class="tres"><a href="" class="btn btn-warning btn-block">Incapacidades</a></div>
			<div class="cuatro"><a href="vacantes/" class="btn btn-success btn-block">Vacantes</a></div>
			<a href="proyectos/" class="btn btn-info btn-block">Personal En Proyectos</a>
			<a href="registro-empleados.php" class="btn btn-secondary btn-block">Registrar Empleados</a>			
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
