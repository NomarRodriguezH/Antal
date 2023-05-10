<?php session_start(); 
if (!isset($_SESSION['JDid'])) {
	header("location: ../login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel Departamento</title>
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
			<h1>Bienvenido jefe de departamento, <?php echo $_SESSION['JDuser'] ?></h1>
			<div class="uno"><a href="agregar-areas-trabajo.php" class="btn btn-primary btn-block">Areas de trabajo</a></div>
			<div class="dos"><a href="asignar-personal/" class="btn btn-danger btn-block">Asignar personal a proyectos</a></div>
			<div class="tres"><a href="seleccionar-candidatos/" class="btn btn-warning btn-block">Seleccionar candidatos de vacantes</a></div>
			
			<center><a style="text-align: center;" href="../cerrar-sesion.php">Cerrar sesión</a>	</center>		
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php  

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="main">
	<div class="box">
		<h1>Panel Departamento</h1>
		<a><div class="1">Agregar areas de trabajo</div></a>
		<a href=""><div class="1"></div></a>
		<a><div class="1">Status de proyectos (comunicar avances)</div></a>
		<a href=""><div class="1"></div></a>
	</div>
</div>
</body>
</html>