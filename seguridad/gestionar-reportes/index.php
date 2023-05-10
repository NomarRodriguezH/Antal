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

   <title>Gestionar Reportes</title>
</head>
<body>
<div class="main">
   <div class="box">
      <h1 style="text-align: center;">Gestionar Reportes</h1><br>
      <a href="../index.php">Volver</a>
      <?php
      $sql = "SELECT * FROM reportes ";
      $resultado = mysqli_query($con, $sql);

      if (!$resultado) {
          echo "Error en la consulta: " . mysqli_error($con);
      }

      echo "<table class='table table-striped'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID </th>";
      echo "<th>id Usuario</th>";
      echo "<th>Fecha inicdente</th>";
      echo "<th>lugar</th>";
      echo "<th>descripcion</th>";
      echo "<th>lesiones</th>";
      echo "<th>danos</th>";
      echo "<th>despues_accidente</th>";
      echo "<th>fecha_reporte</th>";
      echo "<th>Condicion</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($fila = mysqli_fetch_assoc($resultado)) {

          echo "<tr>";
          echo "<td>" . $fila['idUnic'] . "</td>";
                    echo "<td>" . $fila['idU'] . "</td>";

          echo "<td>" .$fila['fecha_incidente'] . "</td>";
          echo "<td>" . $fila['lugar'] . "</td>";
          echo "<td>" . $fila['descripcion'] . "</td>";
                    echo "<td>" . $fila['lesiones'] . "</td>";

          echo "<td>" . $fila['danos'] . "</td>";
          echo "<td>" . $fila['despues_accidente'] . "</td>";
          echo "<td>" . $fila['fecha_reporte'] . "</td>";
          echo "<td>" . $fila['status'] . "</td>";
      }

      mysqli_close($con);

      echo "</tbody>";
      echo "</table>";
      ?>
   </div>
</div>
</body>
</html>