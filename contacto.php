<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contacto</title>

	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="main">
		<div class="box">
			<h1>Contactanos</h1>
			<form action="contacto-envio.php" method="POST">
			<input type="text" placeholder="nombre" name="nombre"> <br>
			<input type="text" placeholder="apellido" name="apellido"> <br>
			<input type="text" placeholder="telefono" name="telefono"> <br>
			<input type="text" placeholder="correo" name="correo"> <br>
			<input type="text" placeholder="direccion_empresa" name="direccion_empresa"> <br>
			<input type="text" placeholder="mensaje" name="mensaje"> <br>
			<input type="submit" value="Enviar">
			</form>
		</div>
	</div>
</body>
</html>