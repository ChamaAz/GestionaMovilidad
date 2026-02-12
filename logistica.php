<?php

if (!isset($_POST["matricula"]) || empty($_POST["matricula"])) {
    die("ERROR: La matrícula es obligatoria.");
}

if (!isset($_POST["empresa"]) || empty($_POST["empresa"])) {
    die("ERROR: La empresa logística es obligatoria.");
}

// Guardar en logistica.txt
$f = fopen("logistica.txt", "a");
fwrite($f, $_POST["matricula"] . " " . $_POST["empresa"] . "\n");
fclose($f);

echo "Permiso de logística guardado correctamente.";

?>
