<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vacantes Disponibles</title>
</head>
<body>
	<div class="main">
		<?php  
		include "conex.php";
		$resultado=mysql_query($con, "SELECT * FROM vacantes")
			echo '<table class="table">';
			echo '<thead>';
			echo '<tr>';
			echo '<th>ID</th>';
			echo '<th>Nombre</th>';
			echo '<th>Apellido</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';

			while ($fila = mysqli_fetch_assoc($resultado)) {
			    echo '<tr>';
			    echo '<td>' . $fila['id'] . '</td>';
			    echo '<td>' . $fila['nombre'] . '</td>';
			    echo '<td>' . $fila['apellido'] . '</td>';
			    echo '</tr>';
			}

			echo '</tbody>';
			echo '</table>';

			mysqli_close($conexion);
			?>
		?>
	</div>
</body>
</html>