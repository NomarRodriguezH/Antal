<?php
  require_once '../../conex.php';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $cargo = $_POST['cargo'];
    $sexo = $_POST['sexo'];
    $pass = $_POST['pass'];
    $status='1';

    $query = "INSERT INTO empleados (nombre, apellido, telefono, correo, cargo, sexo, pass, status) VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$cargo', '$sexo', '$pass', '$status')";
    $res =mysqli_query($con, $query);

    if ($res) {
          $res2 =mysqli_query($con, "UPDATE vacantes_postulaciones SET status='5' WHERE id='$id' ");
          if ($res2) {
          echo "<script>alert('Nuevo empleado registrado');window.location.replace('index.php');</script>";
          }else {
            echo "error 2";}
    } else {
      echo "Error al insertar los datos: " . mysqli_error($con);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($con);
  }
?>
