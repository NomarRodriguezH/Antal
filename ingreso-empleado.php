<?php
   require_once 'conex.php';
   
   session_start();
   
   if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
    header("location: panel-empleado/");
    exit;
   }
   
   $username = $password = "";
   $username_err = $password_err = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST"){
   
      if(empty(trim($_POST["username"]))){
          $username_err = "Por favor ingrese su usuario.";
      } else{
          $username = trim($_POST["username"]);
      }
   
      
      if(empty(trim($_POST["password"]))){
          $password_err = "Por favor ingrese su contraseña.";
      } else{
          $password = trim($_POST["password"]);
      }
      
      if(empty($username_err) && empty($password_err)){
          $sql = "SELECT id, correo, pass FROM empleados WHERE correo = ?";
          
          if($stmt = mysqli_prepare($con, $sql)){ 
   
              mysqli_stmt_bind_param($stmt, "s", $param_username);
              
              $param_username = $username;
              
              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);
                  
                  // Revisa si el user exite, if yes verificar la pass.
                  if(mysqli_stmt_num_rows($stmt) == 1){                    
                      // Bind  
                      mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                      if(mysqli_stmt_fetch($stmt)){
                          if(password_verify($password, $hashed_password)){
                              // pass correcta, so iniciar una nueva sesion.
                              session_start();
                              
                              $_SESSION["login"] = true;
                              $_SESSION["id"] = $id;
                              $_SESSION["username"] = $username;                            
                              
                              header("location: panel-empleado/");
                          } else{
                              $password_err = "La contraseña que has ingresado no es válida.";
                          }
                      }
                  } else{
                      $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                  }
              } else{
                  echo "Algo salió mal, por favor vuelve a intentarlo.";
              }
          }
          
         mysqli_stmt_close($stmt);
   
   
      }
      
      mysqli_close($con);
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Ingreso</title>
      <link rel="preconnect" href="https://fonts.gstatic.com">
   </head>
   <body>
    
      
      <div class="contenedor">
         <form  id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>Login Empleado</h3>
           
               <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>">
              
            <br><br>
           
               <input type="password" name="password" class="form-control" id="password">
               
            <br>
            <button type="submit">Ingresar</button> <br><br>
            
         </form>
      </div>
  
   </body>
</html>