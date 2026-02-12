<?php
$title = "GESTIONAR DE LA MOVILIDAD";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            margin-top: 50px;
            color: #333;
        }
        .button {
            display: inline-block;
            margin: 20px auto;
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <h1><?php echo $title; ?></h1>

    <div class="container">
        <a href="tipoPermiso.php" class="button">SOLICITAR UN PERMISO</a><br>
        <a href="FormularioInfractores.php" class="button">OBTENER EL LISTADO DE LOS INFRACTORES</a>
    </div>

</body>
</html>
