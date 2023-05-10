<?php 
	$uno = $_POST['uno'];
	$dos = $_POST['dos'];
	$tres = $_POST['tres'];
	$unic=$_POST['unic'];?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contactar Para Finalizar Renuncia</title>
</head>
<body>
	<div class="main">
		<div class="box">
			<h1>Contactar Para Finalizar Renuncia</h1>
			<a href="index.php">Volver</a>
			<p>Es importante que proporciones datos adicionales para completar la renuncia.</p>
			<form action='FC.php' method='POST'>
				<?php echo $uno." ".$dos."  ".$tres ?>
			<input type="hidden" name="idR" value="<?php echo $uno ?>">
			<input type="hidden" name="idU" value="<?php echo $dos ?>">
			<input type="hidden" name="s" value="<?php echo $tres ?>">
			<input type="hidden" name="unic" value="<?php echo $unic ?>">
			<input type="text" name="opcion" placeholder="opcion">
			<textarea placeholder="Mensaje" name="mensaje"></textarea>
			<input type="submit" value="Enviar">
			</form>
		</div>
	</div>
</body>
</html>