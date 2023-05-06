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

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Solicitar Renuncia</title>
</head>
<body>
	<div class="main">
		<div class="box">
			<h1>Solicitar Renuncia</h1>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<label for="Declaracion">Declaración: Debes declarar claramente que estás renunciando a su puesto y proporcionar la fecha efectiva de su renuncia. La fecha efectiva de la renuncia debe ser de dos semanas a partir de la fecha de la notificación.</label>
				<input type="text" name="Declaracion" placeholder="Declaración"><br><br>

				<label for="Agradecimiento">Agradecimiento (opcional): es recomendable incluir una nota de agradecimiento al empleador, los compañeros de trabajo por la experiencia y las oportunidades brindadas.</label>
				<input type="text" name="Agradecimiento" placeholder="Mas infromación"><br><br>

				<label for="Razones">Razones de la renuncia: Breve explicación de las razones de la renuncia. </label>
				<input type="text" name="Razones"><br><br>

				<label for="Instrucciones">Instrucciones finales: Debes incluir instrucciones finales sobre cómo se manejarán las tareas pendientes, cómo se entregará el equipo o propiedades dejadas durante tu estadia a la empresa.</label>
				<input type="text" name="Instrucciones"><br><br>

				<input type="submit" value="Enviar">
			</form>
		</div>
	</div>
</body>
</html>