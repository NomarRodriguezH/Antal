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

		 	

		if (!empty($id) || !empty($user) || !empty($status) || !empty($rol)) {
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
					}else if($rol == 6) {
                        session_start();
             $_SESSION["S"] = true;
                        $_SESSION['Sid'] = $id;
                        $_SESSION['Suser'] = $user;
                        $_SESSION['Sstatus'] = $status;
                        header ('location: soporte/');
                        exit;
                    }else if($rol == 7) {
                        session_start();
                        $_SESSION["D"] = true;
                        $_SESSION['Did'] = $id;
                        $_SESSION['Duser'] = $user;
                        $_SESSION['Dstatus'] = $status;
                        header ('location: desarrollador/');
                        exit;
                    }
					else {
						echo "MAL mama";
					}
					
		}
		else {
		echo "<script>
		    alert('No existe una cuenta registrada con estos datos.');
		      window.location.replace('login.php');
		</script>";
		}
	 }
 }
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <title>Ingreso Empleado</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="smart pest" />
    <meta name="keywords" content="solar system /sun & wind" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/meanmenu.css" />
    <link rel="stylesheet" type="text/css" href="css/slicknav.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/venobox.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/camera.css">
    <link rel="stylesheet" type="text/css" href="css/style_2.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive_2.css" />
    <link rel="shortcut icon" type="image/icon" href="images/favicon.png" />
</head>

<body>
    <div class="login_main_wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="image-wrap">
                        <img src="images/form-image.gif" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                    <div class="sw_contact_form_wrapper sw_contact_form_padder login_form_wrapper">
                        <div class="contact_right_wrapper">
                            <div class="cmnt_area_div_mn">
                                <div class="sw_left_heading_wraper sw_dark_heading_wraper">
                                    <h1>Iniciar Sesión</h1>
                                    <img src="images/heading_line.png" alt="title">
                                    <p>Inicia sesión para acceder al panel de trabjador.</p>
                                </div>
                                <div class="row">
                                	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="cont_main_section">

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="contect_form1">
                                                    <input type="text" name="correo" placeholder="Correo*"
                                                        class="require">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="contect_form1">
                                                    <input type="password" name="password" placeholder="Contraseña"
                                                        class="require">
                                                </div>
                                            </div>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" name="" id="check">
                                                    <label for="check">Recuerdame</label>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Olvide mi contraseña</a>
                                                </li>
                                            </ul>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="buttons">
                                                	<input type="submit" class="form-btn" value="Ingresar">
                                                    <a href="index.php">Volver</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery_min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jqu_menu.js"></script>
    <script src="js/jqu_slickmenu.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="venobox/js/venobox.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/camera.min.js"></script>
    <script src="js/custom_2.js"></script>
</body>

</html>