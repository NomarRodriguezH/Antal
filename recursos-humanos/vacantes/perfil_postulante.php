<?php  
	require_once "../../conex.php";
	if (!isset($_GET['idP']) || !is_numeric($_GET['idP'])) {
		header("location: ver-postulantes.php");
	}else {
		$id =$_GET['idP'];
	}
	$X=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vacantes_postulaciones WHERE id='$id' ")); 
	$nombre =$X['nombre'];
	$apellido =$X['apellido'];
	$telefono =$X['telefono'];
	$correo =$X['correo'];
	$sexo =$X['sexo'];
	$mensaje =$X['mensaje'];
	$fecha =$X['fecha'];
	if ($sexo=='1') {
		$s='Mujer';
	}else{
		$s='Hombre';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil De Postulante</title>
	<!-- Estilos Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card mt-5">
					<div class="card-header">
							<h2>Perfil completo de el/la postulante: <?php echo $nombre ?></h2>
					</div>
					<div class="card-body">
						<p class="card-text">Apellido: <?php echo $apellido ?></p>
						<p class="card-text">Teléfono: <?php echo $telefono ?></p>
						<p class="card-text">Correo: <?php echo $correo ?></p>
						<p class="card-text">Sexo: <?php echo $s ?></p>
						<p class="card-text">Mensaje: <?php echo $mensaje ?></p>
						<p class="card-text">Fecha de envío: <?php echo $fecha ?></p>
						<a href='ver-postulantes.php' class='btn btn-primary'>Volver</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
