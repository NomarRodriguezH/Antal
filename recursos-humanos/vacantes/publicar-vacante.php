
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Publicar Vacante</title>
	<!-- Cargar estilos de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Cargar scripts de Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row" >
		<h1>Publicar Vacante De Empleo</h1>
		<div class="col-md-6 offset-md-3" style="background-color: #50FF31;">
			<form method="post" action="pv.php">
				<div class="form-group">
				    <label for="idRH">ID:</label>
				    <input type="text" value="<?php echo uniqid('V_'); ?>" class="form-control" readonly name="idU" required>
				</div>
				<div class="form-group">
				    <label for="nombre">Nombre:</label>
				    <input type="text" class="form-control" name="nombre" required>
				</div>
				<div class="form-group">
				    <label for="cargo">Cargo:</label>
				    <input type="text" class="form-control" name="cargo" required>
				</div>
				<div class="form-group">
				    <label for="sueldo">Sueldo:</label>
				    <input type="text" class="form-control" name="sueldo" required>
				</div>
				<div class="form-group">
				    <label for="categoria">Categoría:</label>
				    <input type="text" class="form-control" name="categoria" required>
				</div>
				<div class="form-group">
				    <label for="subcategoria">Subcategoría:</label>
				    <input type="text" class="form-control" name="subcategoria" required>
				</div>
				<div class="form-group">
				    <label for="estudios">Estudios:</label>
				    <input type="text" class="form-control" name="estudios" required>
				</div>
				<div class="form-group">
				    <label for="plazo">Plazo:</label>
				    <input type="text" class="form-control" name="plazo" required>
				</div>
				<div class="form-group">
				    <label for="info">Información adicional:</label>
				    <textarea class="form-control" name="info" required></textarea>
				</div>
				
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>

