<?php  
   require_once '../conex.php';
   
    if ($_SERVER['REQUEST_METHOD']==='POST') { 
	    $idJ = '1';
	    $area = $_POST['area'];	  

	    $res = mysqli_query($con, "INSERT INTO areas_laborales SET idJ='$idJ', area='$area' ");

	    if ($res) {
	    	echo "<script>alert('Area Laboral Guardada');</script>";
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
	<title>Agregar Areas Laborales</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<a href="index.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left mr-2"></i>Volver</a>
				<h1 class="mb-4">Agregar Areas Laborales</h1>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
					<div class="form-group">
						<label for="area">Area Laboral</label>
						<input type="text" class="form-control" name="area" id="area">
					</div>
					<input type="submit" class="btn btn-primary mt-3" value="Enviar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>