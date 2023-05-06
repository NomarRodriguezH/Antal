<?php  
	require_once "../../conex.php";
 	session_start();
   if(!isset($_SESSION["login"]) ||  $_SESSION["login"] === false){
	header("location: ../../ingreso-empleado.php");    
	exit;}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<title>Proyectos Asignados</title>
</head>
<body>
<div class="main">
	<div class="box">
		<?php

	$resultado = mysqli_query($con, "SELECT * FROM proyectos");

?>

<!-- Crear una tabla de Bootstrap -->
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Recorrer los datos obtenidos de la consulta SQL y mostrarlos en la tabla
    while ($fila = mysqli_fetch_array($resultado)) {
      echo "<tr>";
      echo "<td>" . $fila['id'] . "</td>";
      echo "<td>" . $fila['nombre'] . "</td>";
      echo "<td>" . $fila['apellido'] . "</td>";
      echo "<td>" . $fila['email'] . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

	</div>
</div>
</body>
</html>