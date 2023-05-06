<?php
session_start();
if(isset($_SESSION['alerta'])){
    // Muestra la alerta en JavaScript
    echo "<script>alert('".$_SESSION['alerta']."');</script>";
    // Elimina la variable de sesión
    unset($_SESSION['alerta']);
}
?>


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Registrar Nuevos Empleados</title>
</head>
<body>
   <div class="main">
      <div class="box">
         <h1>Registrar Nuevos Empleados</h1>
         <form action="cr.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellidos" placeholder="Apellidos">
            <input type="text" name="telefono" placeholder="Telefono">
            <input type="text" name="correo" placeholder="Correo">
            <input type="text" name="cargo" placeholder="Cargo">
            <input type="text" name="pass" placeholder="Pass">
            <input type="radio" name="sexo" value="1">Mujer
            <input type="radio" name="sexo" value="2">Hombre
            <input type="submit" value="Registrar">
         </form>
      </div>
   </div>
</body>
</html>