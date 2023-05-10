<?php  
	require_once "../../conex.php";
	$id = $_POST['id'];
	$res = mysqli_query($con, "UPDATE vacantes_postulaciones SET status= '4' WHERE id = '$id' ");
	if ($res) {
		echo "<script>alert('Notificado al jefe de departamento');window.location.replace('ver-postulantes.php');
		</script>";
	}else {echo "Error";}?>
