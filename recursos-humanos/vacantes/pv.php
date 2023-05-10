<?php
require_once"../../conex.php";
session_start();
// Verificar si se ha enviado el formulario

    // Recibir los datos del formulario
    $idU = $_POST['idU'];
    $nombre = $_POST['nombre'];
    $cargo = $_POST['cargo'];
    $sueldo = $_POST['sueldo'];
    $categoria = $_POST['categoria'];
    $subcategoria = $_POST['subcategoria'];
    $estudios = $_POST['estudios'];
    $plazo = $_POST['plazo'];
    $info = $_POST['info'];
    $status = '1';
    $idRH=$_SESSION['RHid']; //REMPLAZAR CON ID DE SESSION

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO vacantes (idU, idRH, nombre, cargo, sueldo, categoria, subcategoria, estudios, plazo, info, status) VALUES ('$idU', '$idRH', '$nombre', '$cargo', '$sueldo', '$categoria', '$subcategoria', '$estudios', '$plazo', '$info', '$status')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Publicado');window.location.replace('publicar-vacante.php');
</script>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);

?>