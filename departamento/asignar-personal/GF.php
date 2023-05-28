lael
<?php 
require_once '../../conex.php';
$idP= $_POST['idP'];
if ($_SERVER['REQUEST_METHOD']==='POST') {
	//if(isset($_POST['datos'])){
    //foreach($_POST['datos'] as $dato){
        //Aquí puedes hacer lo que necesites con los datos seleccionados
    	//}
	//}

		if(isset($_POST['datos'])) {
	    $seleccionados = $_POST['datos'];
	    foreach($seleccionados as $id_empleado) {
		$res = mysqli_query($con, "INSERT INTO proyectos_personal SET idU='$id_empleado', idP='$idP'");
	        if ($res) {
			echo "<script>alert('Personal Asignado');window.location.replace('index.php');</script>";
	        }
	        else {
	            echo mysqli_error($con);	        	
	        }
	    }
	}

} ?>
