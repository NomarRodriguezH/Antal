<?php
require_once "../../conex.php";
$sql = "SELECT * FROM vacantes_postulaciones";
$resultado = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitudes</title>
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
    <h1 style="text-align: center;">Solicitudes Para Vacantes</h1>
    <a href="../index.php">Volver</a>
  </div>
    <table class="table">
  <tr>
    <th>ID</th>
    <th>ID Vacante</th>
    <th>Nombre postulante</th>
    <th>Mensaje</th>
    <th>Info Completa</th>
    <th>Titulo CV</th>
    <th>CV</th>
    <th>Fecha Envio</th>
    <th>Condición</th>
    <th>Acción</th>
  </tr>
  <?php
  while ($fila = mysqli_fetch_assoc($resultado)) {
    $id = $fila['id'];
    $idV = $fila['idV'];
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $mensaje = $fila['mensaje'];
    $nombre_archivo = $fila['nombre_archivo'];
    $contenido_archivo = $fila['contenido_archivo'];
    $status=$fila['status'];
    $fecha = $fila['fecha'];
    $X=mysqli_fetch_assoc(mysqli_query($con, "SELECT idU, nombre FROM vacantes WHERE id='$idV' ")); 
      $idUnicVacante=$X['idU'];
      $nombreV=$X['nombre'];

    ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo "<a href='#'>".$idUnicVacante."</a>". "-". $nombreV; ?></td>
      <td><?php echo $nombre." ".$apellido; ?></td>
      <td><?php echo $mensaje; ?></td>
      <td><a href="perfil_postulante.php?idP=<?php echo $id ?>">Ver</a></td>
      <td><?php echo $nombre_archivo; ?></td>
      <td><a href="ver_cv.php?id=<?php echo $id; ?>">Ver</a></td>
      <td><?php echo $fecha; ?></td>

       <td> 
         <?php if ($status=='1') {
            echo "<p style='color:blue;'>Petición Enviada</p>";
          }else if($status=='2') {
              echo "<p style='color:red;'>Rechazado/a<p>";
          }else if($status=='3') {
              echo "<p style='color:green;'>Seleccionado</p>";
          }else if($status=='4') {
              echo "<p style='color:green;'>Ya enviado <br>Al departamento</p>";
          }
        ?>
    </td>
    
    <td> 
         <?php if ($status=='1') {
            echo "<a href='status.php?id=$id&s=$status'>Acciones</a>";
          }else if($status=='2') {
              echo "<a href='status.php?id=$id&s=$status'>Notificar</a>";
          }else if($status=='3') {
              echo "<a href='status.php?id=$id&s=$status'>Mandar al jefe de<br> departamento </a>";
          }else if($status=='4') {
              echo "-";
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
