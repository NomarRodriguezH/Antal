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

   <title>Renuncias</title>
</head>
<body>
<div class="main">
   <div class="box">
      <h1 style="text-align: center;">Renuncias</h1><br>
      <a href="../index.php">Volver</a>
      <?php
      $sql = "SELECT * FROM renuncias WHERE status='1'";
      $resultado = mysqli_query($con, $sql);

      if (!$resultado) {
          echo "Error en la consulta: " . mysqli_error($con);
      }

      echo "<table class='table table-striped'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID </th>";
      echo "<th>Empleado ID</th>";
      echo "<th>declaración</th>";
      echo "<th>agradecimiento</th>";
      echo "<th>razones</th>";
      echo "<th>instrucciones</th>";
      echo "<th>Condicion</th>";
      echo "<th>Fecha</th>";
     echo "<th>firma</th>";
      echo "<th>contactar</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($fila = mysqli_fetch_assoc($resultado)) {
   $qq ="SELECT * FROM renuncias_firma WHERE idU='{$fila['idu']}' ";
   $re=mysqli_query($con, $qq);
   

          echo "<tr>";
          echo "<td>" . $fila['idR'] . "</td>";
          echo "<td>" . $fila['idu'] . "</td>";
          echo "<td>" .$fila['declaracion'] . "</td>";
          echo "<td>" . $fila['agradecimiento'] . "</td>";
          echo "<td>" . $fila['razones'] . "</td>";
          echo "<td>" . $fila['instrucciones'] . "</td>";
          echo "<td>" . $fila['status'] . "</td>";
          echo "<td>" . $fila['fecha'] . "</td>";
          echo "<td><a href='ver_firma.php?id={$fila['idu']}'>ver</a></td>";

          echo "<td>
          <form action='contactar.php' method='POST'>
          <input type='hidden' value='{$fila['id']}' name='uno'>
          <input type='hidden' value='{$fila['idu']}' name='dos'>
          <input type='hidden' value='{$fila['status']}' name='tres'>
                    <input type='hidden' value='{$fila['idR']}' name='unic'>

          <input type='submit' value='contactar'>
          </form>
          </td>";
      }

      mysqli_close($con);

      echo "</tbody>";
      echo "</table>";
      ?>
   </div>
</div>
</body>
</html>
