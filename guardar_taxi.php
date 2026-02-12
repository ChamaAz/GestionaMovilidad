<?php

if (empty($_POST["matricula"])) {
    die("ERROR: La matrícula es obligatoria.");
}

if (empty($_POST["conductor"])) {
    die("ERROR: El nombre del conductor es obligatorio.");
}

$f = fopen("taxis.txt", "a");
fwrite($f, $_POST["matricula"] . " " . $_POST["conductor"] . "\n");
fclose($f);

echo "Permiso de taxi guardado correctamente.";

?>
