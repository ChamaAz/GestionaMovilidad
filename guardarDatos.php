<?php
function campo($nombre) {
    return isset($_POST[$nombre]) && trim($_POST[$nombre]) !== "";
}

$tipo = $_POST["tipo"] ?? null;

if (!$tipo) {
    die("ERROR: No se recibió el tipo de permiso.");
}

if (!campo("matricula")) {
    die("ERROR: La matrícula es obligatoria.");
}

switch ($tipo) {

    case "residentesyhoteles":
    if (!campo("direccion")) 
        die("ERROR: La dirección es obligatoria.");
    if (!campo("inicio") || !campo("fin")) 
        die("ERROR: Las fechas son obligatorias.");
    if ($_POST["inicio"] > $_POST["fin"]) 
        die("ERROR: La fecha de inicio no puede ser mayor que la fecha fin.");

    // Validar PDF
    if (!isset($_FILES["pdf"]) || $_FILES["pdf"]["error"] !== 0) {
        die("ERROR: Debes adjuntar un PDF.");
    }

    $extension = strtolower(pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION));
    if ($extension !== "pdf") {
        die("ERROR: El archivo debe ser un PDF.");
    }

    // Guardar PDF en la carpeta 'pdfs' con un nombre único
    $nombrePDF = $_POST["matricula"] . "_" . time() . ".pdf";
    move_uploaded_file($_FILES["pdf"]["tmp_name"], "pdfs/" . $nombrePDF);

    // Guardar matrícula + dirección + inicio + fin en el txt
    $archivo = "residentesyhoteles.txt";
    $valorExtra = $_POST["direccion"] . " " . $_POST["inicio"] . " " . $_POST["fin"];
    break;

    case "logistica":
        if (!campo("empresa")) 
            die("ERROR: La empresa logística es obligatoria.");
        $archivo = "logistica.txt";
        $valorExtra = $_POST["empresa"];
        break;

    case "servicios":
        if (!campo("tipo_servicio")) 
            die("ERROR: Debes indicar el tipo de servicio.");
        $archivo = "servicios.txt";
        $valorExtra = $_POST["tipo_servicio"];
        break;

    case "taxis":
        if (!campo("conductor")) 
            die("ERROR: Debes indicar el conductor.");
        $archivo = "taxis.txt";
        $valorExtra = $_POST["conductor"];
        break;

    case "autobusesEMT":
        if (!campo("linea")) 
            die("ERROR: Debes indicar la línea EMT.");
        $archivo = "autobusesEMT.txt";
        $valorExtra = $_POST["linea"];
        break;

    default:
        die("ERROR: Tipo de permiso no válido.");
}

// Guardar matrícula Y valor extra en el archivo correspondiente
$f = fopen($archivo, "a");
$linea = $_POST["matricula"] . " " . $valorExtra . "\n";
fwrite($f, $linea);
fclose($f);

echo "Permiso guardado correctamente.";
?>
