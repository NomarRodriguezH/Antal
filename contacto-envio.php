<?php 
	require_once "conex.php";
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	$direccion_empresa = $_POST['direccion_empresa'];
	$mensaje = $_POST['mensaje'];

	$res= mysqli_query($con, "INSERT INTO contacto SET nombre='$nombre',  apellido='$apellido',  telefono='$telefono',  correo='$correo',  direccion_empresa='$direccion_empresa',  mensaje='$mensaje', fecha_envio=NOW(), status='1' ");

	if ($res) {
		echo "<script>alert('Formulario Enviado'); window.location.replace('index.php')</script>";
	}else {
		echo "error:". mysqli_error($con);
	}

?>