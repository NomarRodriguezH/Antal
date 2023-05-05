<?php
    
    require_once 'conexion.php';

    $nombre = $username = $email = $telefono = $sexo = $password = "";
    $sexo_err = $nombre_err = $telefono_err = $username_err = $email_err = $password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["telefono"]))){
            $username_err = "Por favor, ingrese un telefono de usuario";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE telefono = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_telefono);
                
                $param_telefono = trim($_POST["telefono"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $telefono_err = "Este telefono de usuario ya está en uso";
                    }else{
                        $telefono = trim($_POST["telefono"]);
                    }
                }else{
                    echo "Algo salió mal, inténtalo mas tarde";
                }
            }
        }

        if(empty(trim($_POST["username"]))){
            $username_err = "Por favor, ingrese un nombre de usuario";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE user = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                $param_username = trim($_POST["username"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "Este nombre de usuario ya está en uso";
                    }else{
                        $username = trim($_POST["username"]);
                    }
                }else{
                    echo "Algo salió mal, inténtalo mas tarde";
                }
            }
        }
        
        
        if(empty(trim($_POST["email"]))){
            $email_err = "Por favor, ingrese un correo";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE email = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_email);
                
                $param_email = trim($_POST["email"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $email_err = "Este correo ya está en uso";
                    }else{
                        $email = trim($_POST["email"]);
                    }
                }else{
                    echo "Algo salió mal, inténtalo mas tarde";
                }
            }
        }

        if(empty(trim($_POST["nombre"]))){
            $nombre_err = "Por favor, ingrese un nombre";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE nombre = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_nombre);

                $param_nombre = trim($_POST["nombre"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $nombre_err = "Este nombre ya está en uso";
                    }else{
                        $nombre = trim($_POST["nombre"]);
                    }
                }else{
                    echo "Algo salió mal, inténtalo mas tarde";
                }
            }
        }





        
        // CONTRASEÑA
        if(empty(trim($_POST["password"]))){
            $password_err = "Por favor, ingrese una contraseña";
        }elseif(strlen(trim($_POST["password"])) < 4){
            $password_err = "La contraseña debe de tener al menos 4 caracteres";
        } else{
            $password = trim($_POST["password"]);
        }

        if(empty(trim($_POST["sexo"]))){
            $password_err = "Por favor, seleccione una sexo";
        }
        else{
            if(trim($_POST["sexo"])=='Hombre'){
                 $sexo = '1';
            } else{
                if(trim($_POST["sexo"])=='mujer'){
                 $sexo = '2';
            }
            }
            
           
        }
        
        
        // COMPROBANDO  ERRORES --> BASE DE DATOS
        if(empty($username_err) && empty($email_err) && empty($password_err) && empty($nombre_err)){
            
            $sql = "INSERT INTO usuarios (nombre, user, email, telefono, sexo, contra) VALUES (?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){

                mysqli_stmt_bind_param($stmt, "ssssss", $param_nombre, $param_username, $param_email, $param_telefono, $param_sexo, $param_password);
                
                // ESTABLECIENDO PARAMETRO
                $param_nombre = $nombre;
                $param_username = $username;
                $param_email = $email;
                $param_telefono = $telefono;
                $param_sexo = $sexo;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // ENCRIPTANDO CONTRASEÑA
                
                
                if(mysqli_stmt_execute($stmt)){
                    header("location: login.php");
                }else{
                    echo "Algo Salio mal, intentalo despues";
                }
            }
        }
        mysqli_close($link);   
    }  
?>