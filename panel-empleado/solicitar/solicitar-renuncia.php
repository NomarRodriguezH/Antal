<?php  
require_once "../../conex.php";
session_start();
$idu=$_SESSION["id"];
$idR = crc32(uniqid('renuncia_'));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$Declaracion = $_POST['Declaracion'];
	$Agradecimiento = $_POST['Agradecimiento'];
	$Razones = $_POST['Razones'];
	$Instrucciones=$_POST['Instrucciones'];

    $res = mysqli_query($con, "INSERT INTO renuncias SET declaracion='$Declaracion', agradecimiento='$Agradecimiento', razones='$Razones', instrucciones='$Instrucciones', idu='$idu', idR='$idR', fecha=NOW(), status='1' ");
	if ($res) {
		header('location: firmar.php');
	}else {
	echo "<script>alert('Error " . mysqli_error($con) . "')</script>";

	}

}

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Solicitar Renuncia</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container mt-5">
		<div class="card">
			<h1 class="card-header">Solicitar Renuncia</h1>
			<div class="card-body">
											<a href="../index.php">Volver</a>

				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="form-group">
						<label for="Declaracion">Declaración:</label>
						<input type="text" class="form-control" name="Declaracion" placeholder="Declaración">
					</div>

					<div class="form-group">
						<label for="Agradecimiento">Agradecimiento (opcional):</label>
						<input type="text" class="form-control" name="Agradecimiento" placeholder="Más información">
					</div>

					<div class="form-group">
						<label for="Razones">Razones de la renuncia:</label>
						<input type="text" class="form-control" name="Razones">
					</div>

						<div class="form-group">
						<label for="Instrucciones">Instrucciones finales:</label>
						<input type="text" class="form-control" name="Instrucciones">
					</div>

					<input type="submit" class="btn btn-primary" value="Enviar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
