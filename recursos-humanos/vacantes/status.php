<?php  require_once "../../conex.php";

	if (!isset($_GET['id']) || !is_numeric($_GET['id']) || !isset($_GET['s']) || !is_numeric($_GET['s']) ) {
		header("location: ver-postulantes.php");
	}else {
		$id = $_GET['id']; $s= $_GET['s'];
	}
	$X=mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vacantes_postulaciones WHERE id='$id' ")); 
	$nombre =$X['nombre'];
	$apellido =$X['apellido'];
	$correo= $X['correo'];


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Acciones a postulantes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #f8f9fa;
		}
		.main {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}
		.box {
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
		}
	</style>
</head>
<body>
	<div class="main">
		<div class="box">

		  <?php if ($s=='1') {
            echo "
            	<h1>Acciones de solicitud</h1><br>
            	<p class='mb-4'>Hola recursos humanos, una vez que revisaste la petición es importante que asignes un nuevo 
            	status al postulante ". $nombre. " " .$apellido."</p> <br>

            	<div class='mb-4'>

            	<p>Puedes rechazar la solicitud al trabajo: </p>
            	<form action='rechazar.php' method='POST'>
            	<input type='submit' value='Rezhazar'  class='btn btn-danger'>
            	<input type='hidden' name='id' value='$id'>
            	</form> <br><br>

            	<p>Tambien puedes seleccionar al candidato y notificar al jefe de departamento para que el tome la elección del elejido</p>
            	<form action='seleccionar.php' method='POST'>
            	<input type='submit' value='Seleccionar' class='btn btn-danger'>
            	<input type='hidden' name='id' value='$id'>
            	</form><br><br>
            	<a href='ver-postulantes.php' class='btn btn-primary'>Volver</a>  
            	</div>
            	";


          }else if($s=='2') {
              echo "
              <h1>Acciones de solicitud rechazada</h1><br>
            	<p class='mb-4'>Hola recursos humanos, una vez que rechazaste la solictud de". $nombre. " " .$apellido.". Es importante que notifiques el motivo por el cual se ha rechazada la solicitud. Una vez hecho esto, se guardará el registro de rechazo y se eliminará de las vacantes. Por lo tanto, es importante que tengas cuidado con la información y la decisión tomada, ya que no se podrá recuperar.</p> <br><br>

            		*(Funcionalidad de enviar correo pendiente, pro temas de configuración hosting)<br>
            		Correo electronico:". $correo." 						<a href='ver-postulantes.php' class='btn btn-primary'>Volver</a>


              ";


          }else if($s=='3') {
              echo "
              <h1>Acciones de solicitud</h1><br>
            	<p class='mb-4'>Hola recursos humanos, ". $nombre. " " .$apellido." ha sido seleccionado, por lo que es necesario notificar al jefe de departamento, para que haga la seleccion definitiva de quien o quienes seran contratados de entre los postulantes.</p><br><br>
            	<form action='notificar.php' method='POST'>
            	<input type='submit' class='btn btn-danger' value='Notificar'>
						<a href='ver-postulantes.php' class='btn btn-primary'>Volver</a>
            	<input type='hidden' name='id' value='$id'>
            	</form>
              ";
          }?>
		</div>
	</div>
</body>
</html>