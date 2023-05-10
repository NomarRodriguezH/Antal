<?php  
require_once "../../conex.php";
	$id = $_POST['id'];
	$res = mysqli_query($con, "UPDATE vacantes_postulaciones SET status= '2' WHERE id = '$id' ");
	if ($res) {
		echo "<script>alert('Solicitud Rechazada');window.location.replace('ver-postulantes.php');
</script>";
	} else {
		echo "Error";
	}	
?>
