<?php

//Comprobamos que existen los datos
if (!isset($_POST["matricula"]) || empty($_POST["matricula"])) {
    die("ERROR: La matrícula es obligatoria.");
}

if (!isset($_POST["direccion"]) || empty($_POST["direccion"])) {
    die("ERROR: La dirección es obligatoria.");
}

if (!isset($_POST["inicio"]) || empty($_POST["inicio"])) {
    die("ERROR: La fecha de inicio es obligatoria.");
}

if (!isset($_POST["fin"]) || empty($_POST["fin"])) {
    die("ERROR: La fecha de fin es obligatoria.");
}

// Validar fechas
if ($_POST["inicio"] > $_POST["fin"]) {
    die("ERROR: La fecha de inicio no puede ser mayor que la fecha fin.");
}

// Validar archivo PDF
if (!isset($_FILES["pdf"]) || $_FILES["pdf"]["error"] != 0) {
    die("ERROR: Debes adjuntar un archivo PDF.");
}

$extension = pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION);
if (strtolower($extension) != "pdf") {
    die("ERROR: El archivo adjunto debe ser un PDF.");
}

// Guardar el PDF
move_uploaded_file($_FILES["pdf"]["tmp_name"], "pdfs/" . $_FILES["pdf"]["name"]);

// Guardar los datos en el fichero
$f = fopen("residentesYHoteles.txt", "a");
fwrite($f, $_POST["matricula"] . " " . $_POST["direccion"] . " " . $_POST["inicio"] . " " . $_POST["fin"] . "\n");
fclose($f);

echo "Permiso guardado correctamente.";

?>
