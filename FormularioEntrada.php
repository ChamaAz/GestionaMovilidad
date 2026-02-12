<?php
$tipo = $_POST["tipo"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de permiso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            margin-top: 40px;
        }

        form {
            background-color: #fff;
            display: inline-block;
            padding: 30px 40px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: left;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Solicitud de permiso: <?php echo htmlspecialchars($tipo); ?></h2>

<form action="guardarDatos.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tipo" value="<?php echo htmlspecialchars($tipo); ?>">

    <label>Matrícula:</label>
    <input type="text" name="matricula" required>

    <?php if ($tipo == "residentesyhoteles") { ?>

        <label>Dirección:</label>
        <input type="text" name="direccion" required>

        <label>Fecha inicio:</label>
        <input type="date" name="inicio" required>

        <label>Fecha fin:</label>
        <input type="date" name="fin" required>
        <label>Justificante PDF:</label>
        <input type="file" name="pdf" required>

    <?php } else if ($tipo == "logistica") { ?>

        <label>Empresa logística:</label>
        <input type="text" name="empresa" required>

    <?php } else if ($tipo == "servicios") { ?>

        <label>Tipo de servicio:</label>
        <input type="text" name="tipo_servicio" required>

    <?php } else if ($tipo == "taxis") { ?>

        <label>Conductor:</label>
        <input type="text" name="conductor" required>

    <?php } else if ($tipo == "autobusesEMT") { ?>

        <label>Línea EMT:</label>
        <input type="text" name="linea" required>

    <?php } ?>
    <input type="submit" value="Guardar permiso">
</form>

</body>
</html>
