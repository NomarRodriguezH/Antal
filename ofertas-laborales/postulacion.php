<?php 
	require_once '../conex.php';
		$nombre= $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$correo = $_POST['correo'];
		$idV = $_POST['idV'];
		$sexo = $_POST['sexo'];
		$mensaje= $_POST['mensaje'];
		//$ = $_POST[''];

	$nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
    $temp_archivo = $_FILES['archivo']['tmp_name'];
    $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

    // Comprobar si el archivo subido es un PDF
    if($ext != "pdf") {
        echo "Solo se permiten archivos PDF.";
    } else {
        $max_tamano = 7 * 1024 * 1024; // 10 MB en bytes
        if($tamano_archivo > $max_tamano){
            echo "El tamaño del archivo no debe superar los 7 MB.";
        } else {
            $carpeta_destino = '../recursos-humanos/pdf/';
            $ruta_archivo = $carpeta_destino.$nombre_archivo;

            if(move_uploaded_file($temp_archivo,$ruta_archivo)){
                // Leer el contenido del archivo
                $contenido_archivo = file_get_contents($ruta_archivo);

                // Codificar el contenido en base64
                $contenido_base64 = base64_encode($contenido_archivo);

                // Conectar a la base de datos

                // Insertar el archivo en la base de datos
                $query = "INSERT INTO vacantes_postulaciones SET idV='$idV', nombre='$nombre', apellido='$apellido', telefono='$telefono', correo='$correo', sexo='$sexo', mensaje='$mensaje', nombre_archivo='$nombre_archivo', tipo_archivo='$tipo_archivo', tamano_archivo='$tamano_archivo', contenido_archivo='$contenido_base64', status='1', fecha=NOW() ";

				$res = mysqli_query($con, $query);
             
                if($res){
                    echo "El archivo se ha subido correctamente.";
                    header('location: espera.php');
                } else {
                    echo "Ha ocurrido un error al subir el archivo." .mysqli_error($con); ;
                }
                mysqli_close($con);
            } else {
                echo "Ha ocurrido un error al subir el archivo.";
            }
        }
    } //fin else
?>