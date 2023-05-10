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
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reportar Accidente</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Reportar Incidente</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group">
                                <label for="fecha_incidente">Fecha y Hora del Incidente:</label>
                                <input type="datetime-local" class="form-control" id="fecha_incidente" name="fecha_incidente">
                            </div>
                            <div class="form-group">
                                <label for="lugar">Lugar:</label>
                                <?php
                                    $resultado = mysqli_query($con, "SELECT * FROM areas_laborales");
                                    echo "<select class='form-control' id='lugar' name='lugar'>";
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<option value='" . $fila['id'] . "'>" . $fila['area'] . "</option>";
                                    }
                                    echo "</select>";
                                    mysqli_close($con);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="lesiones">Lesiones:</label>
                                <input type="text" class="form-control" id="lesiones" name="lesiones">
                            </div>
                            <div class="form-group">
                                <label for="danos">Daños:</label>
                                <input type="text" class="form-control" id="danos" name="danos">
                            </div>
                            <div class="form-group">
                                <label for="despues_accidente">Actividades después del incidente:</label>
                                <input type="text" class="form-control" id="despues_accidente" name="despues_accidente">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
