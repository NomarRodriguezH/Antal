<?php  
require_once "../conex.php";
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<title>Seleccionar Candidatos</title>

</head>
<body>
<div class="main">
	<div class="box">
	<div class="row">
		 	<h1 style="text-align: center;">Vacantes Ofertadas Por La Empresa</h1>
    <?php
    $result = mysqli_query($con,"SELECT * FROM vacantes");
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $idU = $row['idU'];
        $idRH = $row['idRH'];
        $nombre = $row['nombre'];
        $cargo = $row['cargo'];
        $sueldo = $row['sueldo'];
        $categoria = $row['categoria'];
        $subcategoria = $row['subcategoria'];
        $estudios = $row['estudios'];
        $plazo = $row['plazo'];
        $info = $row['info'];
        $status = $row['status'];
        $P =  mysqli_query($con, "SELECT * FROM vacantes_postulaciones WHERE idV='$id'");
       $num_filas = mysqli_num_rows($P);


        $Sactivo=true;
        if ($status=='1') {
        	$newS="<p  style='color:green'>Con cupos</p>";
        	$Sactivo=true;
        }else if ($status=='2') {
        	$newS="<p style='color:orange'>Vacantes limitadas</p>";
        	$Sactivo=true;
        }else {
        	$newS="<p style='color:red;'> Vacante en proceso de selección</p>";
        	$Sactivo=false;
        }
    ?>
      <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $nombre; ?></h5>
                <h6 id ="nn" class="card-subtitle mb-2 text-muted"><?php echo $cargo ?></h6>
                <p class="card-text"><?php echo substr(strip_tags($info),0,200)."..."; ?></p>
                <p class="card-text"><?php echo "Sueldo mensual: ". $sueldo?></p>
                <p class="card-text"><?php echo "Categoria: ". $categoria?></p>
                <p class="card-text"><?php echo "Subcategoria: ". $subcategoria?></p>
                <p class="card-text"><?php echo "Estudios requeridos: ". $estudios?></p>
                <p class="card-text"><?php echo "Plazo: ". $plazo?></p>
                <p class="card-text"><?php echo $newS?></p>
                <p class="card-text"><?php echo "Personas postuladas: ". $num_filas?></p>
                <?php 
                	if ($Sactivo==true) {
					echo "<a href='postular.php?id={$id}' class='btn btn-primary'>Postular</a>";
                	}else if ($Sactivo==false) {
                	echo "<a class='btn btn-primary' style='background-color:red;'>Cerrada</a>";}
                ?>
                <p>ID: <?php echo $idU ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
	</div>	
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>