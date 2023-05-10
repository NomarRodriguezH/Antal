<?php  
require_once '../../conex.php';
session_start();
if (!isset($_GET['idP']) || !is_numeric($_GET['idP'])) {
	header('location: index.php');
}

$idP=$_GET['idP'];
$x = mysqli_query($con, "SELECT nombre FROM proyectos WHERE id='$idP' LIMIT 1");
$fila=mysqli_fetch_array($x);
$nombre= $fila['nombre'];

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Asignar Personal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="card">
		<div class="card-body">
			<h2 class="card-title">Asignar Nuevo Personal Al Proyecto <b><?php echo $nombre ?></b></h2>
			<br>
			<a href="index.php">Volver</a>
			<?php
				$R = mysqli_query($con, "SELECT * FROM proyectos_personal WHERE idP='$idP'");
				if(mysqli_num_rows($R) > 0) {
				  echo "<p>El personal que actualmente trabaja en el proyecto es:</p>";
				  while($fila=mysqli_fetch_assoc($R)) {
				    $idEmpleado=$fila['idU'];
				    $RE = mysqli_query($con, "SELECT * FROM empleados WHERE id='$idEmpleado'");
				    $filas=mysqli_fetch_assoc($RE);
				    $nombreEmpleado=$filas['nombre'];
				    $apellidoEmpleado=$filas['apellido'];
				    $cargoEmpleado=$filas['cargo'];
				    echo $nombreEmpleado. " ".$apellidoEmpleado. " con cargo de ". "cargo de: ". $cargoEmpleado. ".<br>";
				  }
				} else {
				  echo "<p>No hay personal asignado al proyecto.</p>";

			}?>
			<br><br>
			<form method="post" action="GF.php">
			<?php
			$sql = "SELECT id, nombre, cargo FROM empleados";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        ?>
			        <div class="form-check">
			            <input class="form-check-input" type="checkbox" name="datos[]" value="<?php echo $row['id']; ?>">
			            <label class="form-check-label"><?php echo "Nombre: ".$row['nombre'].",    con cargo de: ".$row['cargo']; ?></label>
			        </div>
			        <?php
			    }
			} else {
			    echo "No se encontraron empleados para asignar al proyecto";
			}
			?><br><br>
			<input type="hidden" name="idP" value="<?php echo $idP ?>">
			<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
