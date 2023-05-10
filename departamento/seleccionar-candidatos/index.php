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

   <title>Seleccionar Nuevos Empleados</title>
</head>
<body>
<div class="main">
   <div class="box">
      <h1 style="text-align: center;">Seleccionar Nuevos Empleados</h1><br>
      <a href="../index.php">Volver</a>
      <?php
      $sql = "SELECT * FROM vacantes ";
      $resultado = mysqli_query($con, $sql);

      if (!$resultado) {
          echo "Error en la consulta: " . mysqli_error($con);
      }

      echo "<table class='table table-striped'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID Vacante</th>";
      echo "<th>Nombre</th>";
      echo "<th>Cargo a desempeñar</th>";
      echo "<th>categoria</th>";
      echo "<th>Total de seleccionados</th>";
      echo "<th>Seleccionar candidato</th>";


      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($fila = mysqli_fetch_assoc($resultado)) {
      $q = "SELECT * FROM vacantes_postulaciones WHERE status='4' AND idV='" . $fila['id'] . "'";
        $resultadox = mysqli_query($con, $q);
        $num_filas = mysqli_num_rows($resultadox);



          echo "<tr>";
          echo "<td>" . $fila['idU'] . "</td>";
          echo "<td>" .$fila['nombre'] . "</td>";
          echo "<td>" . $fila['cargo'] . "</td>";
          echo "<td>" . $fila['categoria'] . "</td>";
          echo "<td>" . $num_filas. "</td>";

          if ($num_filas >0) {
                      echo "<th> <a href='nuevo-empleado.php?idV=" . $fila['id'] . "'>Seleccionar</a></th>";

          }else{
            echo "<th>Deben existir candidatos</th>";
          }
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