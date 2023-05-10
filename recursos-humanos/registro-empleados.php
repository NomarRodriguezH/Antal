<?php
session_start();
if(isset($_SESSION['alerta'])){
    // Muestra la alerta en JavaScript
    echo "<script>alert('".$_SESSION['alerta']."');</script>";
    // Elimina la variable de sesión
    unset($_SESSION['alerta']);
}?><!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Registrar Nuevos Empleados</title>

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
   <div class="container mt-5">
      <div class="card">
                     <a href="index.php">Volver</a>

         <h5 class="card-header bg-primary text-white">Registrar Nuevos Empleados</h5>
         <div class="card-body">
            <form action="cr.php" method="POST">
               <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre">
               </div>
               <div class="form-group">
                  <label for="apellidos">Apellidos:</label>
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
               </div>
               <div class="form-group">
                  <label for="telefono">Telefono:</label>
                  <input type="text" class="form-control" name="telefono" placeholder="Telefono">
               </div>
               <div class="form-group">
                  <label for="correo">Correo:</label>
                  <input type="text" class="form-control" name="correo" placeholder="Correo">
               </div>
               <div class="form-group">
                  <label for="cargo">Cargo:</label>
                  <input type="text" class="form-control" name="cargo" placeholder="Cargo">
               </div>
               <div class="form-group">
                  <label for="pass">Contraseña:</label>
                  <input type="password" class="form-control" name="pass" placeholder="Contraseña">
               </div>
               <div class="form-group">
                  <label for="sexo">Sexo:</label><br>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="sexo" id="mujer" value="1">
                     <label class="form-check-label" for="mujer">Mujer</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="sexo" id="hombre" value="2">
                     <label class="form-check-label" for="hombre">Hombre</label>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
         </div>
      </div>
   </div>

   <!-- Bootstrap JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
