<?php
   require_once 'conex.php';
   
   session_start();
   
   if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
    header("location: panel-empleado/");
    exit;}
   
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

   <html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ingreso Empleado</title>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="ja.js"></script>
</head>
<body>
  <style>@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
  box-sizing: border-box;
}

body {
  background: #f6f5f7;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Montserrat', sans-serif;
  height: 100vh;
  margin: -20px 0 50px;
}

h1 {
  font-weight: bold;
  margin: 0;
}

h2 {
  text-align: center;
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

span {
  font-size: 12px;
}

a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

button {
  border-radius: 20px;
  border: 1px solid #FF4B2B;
  background-color: #FF4B2B;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: transparent;
  border-color: #FFFFFF;
}
.boton {
  border-radius: 20px;
  border: 1px solid #FF4B2B;
  background-color: #FF4B2B;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

.boton:active {
  transform: scale(0.95);
}

.botonn:focus {
  outline: none;
}

.boton.ghost {
  background-color: transparent;
  border-color: #FFFFFF;
}

form {
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.container {
  background-color: #fff;
  border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px;
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.right-panel-active .sign-in-container {
  transform: translateX(100%);
}

.sign-up-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.container.right-panel-active .sign-up-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%, 49.99% {
    opacity: 0;
    z-index: 1;
  }
  
  50%, 100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container{
  transform: translateX(-100%);
}

.overlay {
  background: #FF416C;
  background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
  background: linear-gradient(to right, #FF4B2B, #FF416C);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #FFFFFF;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
    transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-left {
  transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}

.social-container {
  margin: 20px 0;
}

.social-container a {
  border: 1px solid #DDDDDD;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 40px;
  width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}</style>
<div class="container" id="container">
  <div class="form-container sign-up-container">
    <form action="#">
      <h1></h1>
      <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span></span>
      <input type="text" placeholder="Name" />
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Password" />
      <button>Sign Up</button>
    </form>
  </div>
  <div class="form-container sign-in-container">
         <form  id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <h1>Inicia Sesion</h1>
               <input type="text" placeholder="Correo" name="username" id="username" class="form-control" value="<?php echo $username; ?>">

               <div class="form-group">
               <input type="password" placeholder="Contraseña" name="password" class="form-control" id="password">
              </div><br>

              <input type="submit" name="boton" class="boton" value="Ingresar"> 
            </form>


          <span class="show-pass icon-eye" title="show characters"></span>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1></h1>
        <p></p>
        <button class="ghost" id="signIn"></button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Bienvenido a Antal</h1>
        <p>Ingresa tu usuario y contraseña y disfruta de nuestros servicios</p>
        <button type="submit" class="ghost" id="signUp">Ver Vacantes</button> <
      </div>
    </div>
  </div>
</div>
</body>
</html>