<?php  
   require_once '../../conex.php';
   session_start();
   if(!isset($_SESSION["login"]) && $_SESSION["login"] === false){
    header("location: ../../index.php");
    exit;}
	$idu=$_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD']==='POST') {
		$idUnic = uniqid('R_');
	    $fecha_incidente = $_POST['fecha_incidente'];
	    $lugar = $_POST['lugar']; 
	    $descripcion = $_POST['descripcion']; 
	    $lesiones = $_POST['lesiones']; 
	    $danos = $_POST['danos']; 
	    $despues_accidente = $_POST['despues_accidente']; 

	    $res = mysqli_query($con, "INSERT INTO reportes SET idUnic='$idUnic', idU='$idu', fecha_incidente='$fecha_incidente', lugar='$lugar', descripcion='$descripcion', lesiones='$lesiones', danos='$danos', despues_accidente='$despues_accidente', fecha_reporte=NOW(), status='1' ");

	    if ($res) {
	    	echo "<script>alert('Reporte Enviado');</script>";
	    }else {
	    	echo mysqli_error($con);
	    }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportar Accidente</title>
</head>
<body>
	<div class="main">
		<div class="box">
			<h1>Reportar Incidente</h1>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
				<input type="datetime-local" name="fecha_incidente">
				<input type="text" name="lugar">
				<input type="text" name="descripcion">
				<input type="text" name="lesiones">
				<input type="text" name="danos">
				<input type="text" name="despues_accidente">
				<input type="submit" value="Enviar">
			</form>
		</div>
	</div>
</body>
</html>