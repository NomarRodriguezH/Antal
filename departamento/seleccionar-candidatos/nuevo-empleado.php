<?php  
require_once '../../conex.php';
session_start();
$idV = $_GET['idV'];
$fila = mysqli_fetch_assoc(mysqli_query($con, "SELECT idU, cargo FROM vacantes WHERE id='$idV' "));
$idU=$fila['idU'];
$cargo=$fila['cargo'];?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

   <title>Seleccionar Nuevos Empleados</title>
</head>
<body>
<div class="main">
   <div class="box">
      <h2 style="text-align: center;">Seleccionar Empleado Para Vacante <?php echo $idU." ".$cargo ?></h2><br>
      <a href="../index.php">Volver</a>
      <?php
      $sql = "SELECT * FROM vacantes_postulaciones WHERE idV='$idV' AND status='4' ";
      $resultado = mysqli_query($con, $sql);

      if (!$resultado) {
          echo "Error en la consulta: " . mysqli_error($con);
      }

      echo "<table class='table table-striped'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID Vacante</th>";
      echo "<th>nombre</th>";
      echo "<th>apellido</th>";
      echo "<th>telefono</th>";
      echo "<th>correo</th>";
      echo "<th>sexo</th>";
      echo "<th>Ver CV</th>";
      echo "<th>Seleccionar</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $fila['idV'] . "</td>";
          echo "<td>" .$fila['nombre'] . "</td>";
          echo "<td>" . $fila['apellido'] . "</td>";
          echo "<td>" . $fila['telefono'] . "</td>";
            echo "<td>" . $fila['correo'] . "</td>";
            if ($fila['sexo']=='1') {
                echo "<td>Mujer</td>";
            }else{    echo "<td>Hombre</td>";}
           echo "<td>*pendiente</td>";
          echo "<th>
          <form action='NE.php' method='POST'>
          <input type='hidden' name='id' value='{$fila['id']}'>
          <input type='hidden' name='nombre' value='{$fila['nombre']}'>
          <input type='hidden' name='apellido' value='{$fila['apellido']}'>
          <input type='hidden' name='telefono' value='{$fila['telefono']}'>
          <input type='hidden' name='correo' value='{$fila['correo']}'>
          <input type='hidden' name='cargo' value=$cargo'>
          <input type='hidden' name='sexo' value='{$fila['sexo']}'>
          <input type='hidden' name='pass' value='" . uniqid() . "'>
          <input type='submit' value='Seleccionar'>
          </form>
          </th>";

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