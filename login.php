<?php
    require_once "conex.php";
  session_start();
    if(isset($_SESSION["log"]) && $_SESSION["log"] === true){
        header("location: controller-esp.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){


    	if(empty(trim($_POST["correo"]))){
        $correo_err = "Por favor ingrese su correo.";
	    } else{
	        $correo = trim($_POST["correo"]);
	    }

    
	    if(empty(trim($_POST["password"]))){
	        $password_err = "Por favor ingrese su contraseña.";
	    } else{
	        $password = trim($_POST["password"]);
	    }


	 if(!empty($password) && !empty($correo)){
		$res=mysqli_query($con, "SELECT * FROM personal WHERE correo = '$correo' AND pass = '$password' ");
		$fila=mysqli_fetch_assoc($res);
		$id =$fila['id'];
		$user =$fila['usuario'];
		$status = $fila['status'];
		$rol= $fila['id_rol']; 	

		if (!empty($user) || !empty($rol)){
					if($rol == 1 ){ //Recursos humanos
						session_start();
            $_SESSION["RH"] = true;
						$_SESSION['RHid'] = $id;
						$_SESSION['RHuser'] = $user;
						$_SESSION['RHstatus'] = $status;
						header ('location: recursos-humanos/');
						exit;
					}
					else if($rol == 2) { // Jefe de departamento
						session_start();
            $_SESSION["JD"] = true;
						$_SESSION['JDid'] = $id;
						$_SESSION['JDuser'] = $user;
						$_SESSION['JDstatus'] = $status;
						header ('location: departamento/');
						exit;
					}
					else if($rol == 3) { // Encargado de finanzas
						session_start();
             $_SESSION["EF"] = true;
						$_SESSION['EFid'] = $id;
						$_SESSION['EFuser'] = $user;
						$_SESSION['EFstatus'] = $status;
						header ('location: finanzas/');
						exit;
					}
					else if($rol == 4) { // Encargado de seguridad
						session_start();
             $_SESSION["ES"] = true;
						$_SESSION['ESid'] = $id;
						$_SESSION['ESuser'] = $user;
						$_SESSION['ESstatus'] = $status;
						header ('location: seguridad/');
						exit;
					}
					else if($rol == 5) {
						session_start();
             $_SESSION["CEO"] = true;
						$_SESSION['CEOid'] = $id;
						$_SESSION['CEOuser'] = $user;
						$_SESSION['CEOstatus'] = $status;
						header ('location: CEO-PANEL/');
						exit;
					}
					else {
						echo "MAL mama";
					}
					
		}
		else {
			echo "No existe una cuenta registrada con estos datos.";
		}
	 }
 }
?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  <script type="text/javascript" src="ja.js"></script>
</head>
<body>
	<div class="bg-wrapper">
		<div class="bg-grad orange active"></div>
		<div class="bg-grad red"></div>
		<div class="bg-grad purple"></div>
		<div class="bg-grad blue"></div>
		<div class="bg-grad green"></div>
		<div class="bg-grad yellow"></div>
	</div>
	<div class="login-wrapper">
		<div class="x-wrapper">
			<div class="y-wrapper">
				<div class="title-wrapper">
					<h2>Iniciar Sesión</h2>
					<h4>Como Personal De La Empresa X.</h4>
				</div>

				<div class="input-box">

						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							 <input id="username" autocomplete="off" placeholder="Correo" type="text" name="correo"><br><br>

							 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					        <input type="password" autocomplete="off" id="password" name="password"  placeholder="Contraseña" class="form-control"><br>
					      </div><br>

							<input type="submit" name="" value="Ingresar">	
						</form>


					<span class="show-pass icon-eye" title="show characters"></span>
				</div>
				<div class="button-wrapper">
					<a href="#">Olvide mi contraseña</a>
					<a href="especialistas/solicitud-especialista"><span class="login-btn" >Registrarse</span></a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>