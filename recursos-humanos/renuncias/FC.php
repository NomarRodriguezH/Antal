<?php 
require_once '../../conex.php';
$idR =$_POST['idR'];
$idU =$_POST['idU'];
$s =$_POST['s'];
$opcion =$_POST['opcion'];
$mensaje =$_POST['mensaje'];
$unic=$_POST['unic'];

$res= mysqli_query($con, "INSERT INTO renuncias_finalizadas SET idU='$idU', mensaje ='$mensaje', opcion='$opcion', fecha=NOW(), idUnic='$unic', idR='$idR', status='1'");
if ($res) {
	echo "<script>
	alert('Mensaje Enviado');
	</script>";

	$resx= mysqli_query($con, "UPDATE renuncias SET status='2' WHERE idu='$idU' ");

	if ($resx) {
		header("location: index.php");	}
	else {
		echo "Error: ". mysqli_error($con);
	}

}else {
	echo "Error: ". mysqli_error($con);
}?>