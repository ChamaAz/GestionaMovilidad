<?php

if (empty($_POST["matricula"])) {
    die("ERROR: La matrícula es obligatoria.");
}

if (empty($_POST["linea"])) {
    die("ERROR: Debes introducir la línea de EMT.");
}

$f = fopen("vehiculosEMT.txt", "a");
fwrite($f, $_POST["matricula"] . " " . $_POST["linea"] . "\n");
fclose($f);

echo "Permiso de EMT guardado correctamente.";

?>
