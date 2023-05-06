<?php
    session_start();
    require_once '../conex.php';

    $nombre = $apellido = $telefono = $correo = $cargo = $password = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $telefono = trim($_POST["telefono"]);
    $cargo = trim($_POST["cargo"]);
    $status='1';
        
        
        if(empty(trim($_POST["correo"]))){
            echo "ingresa un correo";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM empleados WHERE correo = ?";
            
            if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_email);
                
                $param_email = trim($_POST["correo"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $email_err = "Este correo ya está en uso";
                    }else{
                        $email = trim($_POST["correo"]);
                    }
                }else{
                    echo "Algo salió mal, inténtalo mas tarde";
                }
            }
        }

       

        // CONTRASEÑA
        if(empty(trim($_POST["pass"]))){
            $password_err = "Por favor, ingrese una contraseña";
        }elseif(strlen(trim($_POST["pass"])) < 4){
            echo "La contraseña debe de tener al menos 4 caracteres";
        } else{
            $password = trim($_POST["pass"]);
        }

        if(empty(trim($_POST["sexo"]))){
            $password_err = "Por favor, seleccione una sexo";
        }
        else{
            if(trim($_POST["sexo"])=='1'){
                 $sexo = '1';
            } else{
                if(trim($_POST["sexo"])=='2'){
                 $sexo = '2';
            }
            }
            
           
        }
        
        
        // COMPROBANDO  ERRORES --> BASE DE DATOS
        if(empty($username_err) && empty($email_err) && empty($password_err) && empty($nombre_err)){
            
            $sql = "INSERT INTO empleados (nombre, apellido, telefono, correo, cargo, sexo, pass, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($con, $sql)){

                mysqli_stmt_bind_param($stmt, "ssssssss", $param_nombre, $pa, $pt, $param_email, $pc, $param_sexo, $param_password, $ps);
                
                // ESTABLECIENDO PARAMETRO
                $param_nombre = $nombre;
                $pa=$apellidos;
                $pt=$telefono;
                $param_email = $email;
                $pc=$cargo;
                $param_sexo = $sexo;
                $ps=$status;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // ENCRIPTANDO CONTRASEÑA
                
                
                if(mysqli_stmt_execute($stmt)){
                    $_SESSION['alerta'] = "Empleado Registrado Exitosamente";

                     header("location: registro-empleados.php");
                }else{
                    echo "Algo Salio mal, intentalo despues";
                }
            }
        }
        mysqli_close($con);   
    }  
?>