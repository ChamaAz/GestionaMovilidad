<?php

if (empty($_POST["matricula"])) {
    die("ERROR: La matrícula es obligatoria.");
}

if (empty($_POST["tipo_servicio"])) {
    die("ERROR: Debes indicar el tipo de servicio.");
}

$f = fopen("servicios.txt", "a");
fwrite($f, $_POST["matricula"] . " " . $_POST["tipo_servicio"] . "\n");
fclose($f);

echo "Permiso de servicios guardado correctamente.";

?>
