<?php
require_once "../../conex.php";
$sql = "SELECT * FROM proyectos";
$resultado = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyectos</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style type="text/css">
      a{
        text-decoration: none;
        color: orangered;
      }
    </style>

</head>
<body>
  <div class="box">
    <h1 style="text-align: center;">Proyectos</h1>
    <a href="../index.php">Volver</a>
  </div>
    <table class="table">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>#</th>
    <th>objetivos</th>
    <th>descripcion</th>
    <th>plan</th>
    <th>etapas</th>
    <th>responsabilidades</th>
    <th>resultados</th>
    <th>status</th>
  </tr>
  <?php
  while ($fila = mysqli_fetch_assoc($resultado)) {
    $id = $fila['id'];
    $idV = $fila['Nombre'];
    $nombre = $fila['idUnic'];
    $apellido = $fila['objetivos'];
    $mensaje = $fila['descripcion'];
    $nombre_archivo = $fila['plan'];
    $contenido_archivo = $fila['etapas'];
    $status=$fila['responsabilidades'];
    $fecha = $fila['resultados'];
    $statuss=$fila['status'];?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $idV; ?></td>
      <td><?php echo $nombre; ?></td>
      <td><?php echo $apellido; ?></td>
      <td><?php echo $mensaje; ?></td>
      <td><?php echo $nombre_archivo; ?></td>
      <td><?php echo $contenido_archivo; ?></td>

      <td><?php echo $status?></td>
      <td><?php echo $fecha; ?></td>
       <td> 
         <?php if ($status=='1') {
            echo "<p style='color:blue;'>Activo</p>";
          }else if($status=='2') {
              echo "<p style='color:red;'>Suspendido/a<p>";
          }
        ?>
    </td>
    

    </tr>
    <?php
  }
  ?>
</table>

</body>
</html>
