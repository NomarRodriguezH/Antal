<?php  
	require_once '../conex.php';
	if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	header("location: index.php");
	}else {
		$idP =$_GET['id'];
	}

	$resultado = mysqli_query($con, "SELECT * FROM vacantes WHERE id='$idP'");
	$filas=mysqli_fetch_assoc($resultado);
	$cargo = $filas['cargo'];
	$nombre=$filas['nombre'];
	$info=$filas['info'];

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Postular A Vacante</title>
	<!-- Agregamos los estilos de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1 class="display-4"><?php echo "Postulate para el trabajo de ".$nombre." con cargo de ".$cargo ;?></h1>
		<hr class="my-4">
		<p class="lead"><?php echo "Descripción completa del puesto:<br><br>".$info."<br><br>Si cumples con los requisitos de la vacante no dudes en llenar el siguiente formulario con tus datos para que nuestro equipo de recursos humanos te contacte"; ?></p>
		<form action="postulacion.php" enctype="multipart/form-data" method="POST">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre">
			</div>
			<div class="form-group">
				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" class="form-control" placeholder="Apellido">
			</div>
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" class="form-control" placeholder="Telefono">
			</div>
			<div class="form-group">
				<label for="correo">Correo</label>
				<input type="text" name="correo" class="form-control" placeholder="Correo">
			</div>
			<div class="form-group">
				<label for="sexo">Sexo</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="sexo" value="1">
					<label class="form-check-label" for="sexo">Mujer</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="sexo" value="2">
					<label class="form-check-label" for="sexo">Hombre</label>
				</div>
			</div>
			<div class="form-group">
				<label for="mensaje">Mensaje adicional</label>
				<textarea name="mensaje" class="form-control" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="archivo">CV</label>
				<input type="file" name="archivo" class="form-control-file" accept="application/pdf" id="archivo">
			</div>
			<input type="hidden" name="idV" value="<?php echo $idP ?>">
			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
</div>
<!-- Agregamos los scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0
