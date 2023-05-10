<?php 

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacantes</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Estilos personalizados -->
    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5f5;
            padding: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .box a {
            text-decoration: none;
        }

        .box a:hover {
            color: #007bff;
        }

        .box .btn {
            width: 100%;
            margin-top: 20px;
        }

        .box .btn:hover {
            background-color: #007bff;
            border-color: #007bff;
        }

        .box .uno {
            background-color: #007bff;
            color: #fff;
            font-size: 30px;
            padding: 20px 40px;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .box .uno:hover {
            background-color: #0056b3;
            cursor: pointer;
            transform: scale(1.1);
        }

        .box .dos {
            background-color: #fff;
            color: #007bff;
            font-size: 30px;
            padding: 20px 40px;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .box .dos:hover {
            background-color: #f5f5f5;
            cursor: pointer;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="box">
            <a href="publicar-vacante.php"><div class="uno">Publicar Vacante</div></a>
            <a href="ver-postulantes.php"><div class="dos">Ver Postulantes</div></a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
