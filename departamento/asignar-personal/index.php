<?php  
require_once '../../conex.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<title>Asignar Personal</title>
</head>
<body>
<div class="main">
	<div class="box">
		<h1 style="text-align: center;">Asignar personal a proyectos</h1><br>
		<a href="../index.php">Volver</a>
		<?php
		$sql = "SELECT * FROM proyectos";
		$resultado = mysqli_query($con, $sql);

		if (!$resultado) {
		    echo "Error en la consulta: " . mysqli_error($con);
		}

		echo "<table class='table table-striped'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Asignador</th>";
		echo "<th>objetivos</th>";
		echo "<th>etapas</th>";
		echo "<th>responsabilidades</th>";
		echo "<th>status</th>";
		echo "<th>Asignar Personal</th>";

		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		while ($fila = mysqli_fetch_assoc($resultado)) {
		    echo "<tr>";
		    echo "<td>" . $fila['idUnic'] . "</td>";
		    echo "<td>" .$fila['idAsgnador'] . "</td>";
		    echo "<td>" . $fila['objetivos'] . "</td>";
		    echo "<td>" . $fila['etapas'] . "</td>";
		   	echo "<td>" . $fila['responsabilidades'] . "</td>";
		    echo "<td>" . $fila['status'] . "</td>";
		    echo "<th> <a href='asignar_personal.php?idP=" . $fila['id'] . "'>Asignar</a></th>";

		    echo "</tr>";
		}

		mysqli_close($con);

		echo "</tbody>";
		echo "</table>";
		?>
	</div>
</div>
</body>
</html>