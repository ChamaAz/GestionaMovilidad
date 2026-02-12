<?php
// validar campos
function campo($nombre) {
    return isset($_POST[$nombre]) && trim($_POST[$nombre]) !== "";
}

// Validar fechas
if (!campo("fecha_inicio") || !campo("fecha_fin")) {
    die("ERROR: Debes indicar el rango de fechas ");
}

$inicio = $_POST["fecha_inicio"];
$fin = $_POST["fecha_fin"];

if ($inicio > $fin) {
    die("ERROR: La fecha inicial no puede ser mayor que la fecha final.");
}

// LEER VEHÍCULOS
$archivoVehiculos = "Vehiculos.txt";
$vehiculos = [];

$f = fopen($archivoVehiculos, "r");
if (!$f) 
    die("ERROR: No se pudo abrir el fichero Vehiculos.txt.");

while (($linea = fgets($f)) !== false) {
    $linea = trim($linea);
    if ($linea === "") 
        continue;

    $campos = explode(" ", $linea);
    $combustible = strtolower(end($campos));

    if ($combustible === "electrico") 
        continue;

    $vehiculos[] = $campos;
}
fclose($f);

// Ficheros de tipos
$tiposArchivos = [
    "residentes" => "residentesyhoteles.txt",
    "logistica" => "logistica.txt",
    "servicios" => "servicios.txt",
    "taxis" => "taxis.txt",
    "autobuses" => "autobusesEMT.txt"
];

$infractores = [];

foreach ($vehiculos as $v) {

    $matricula = $v[0];

    // convertir fecha al mismo formato que el formulario
    $fecha = str_replace("/", "-", $v[3]);
    $hora  = $v[4];

    if ($fecha < $inicio || $fecha > $fin) 
        continue;

    $tipoVehiculo = null;

    foreach ($tiposArchivos as $tipo => $archivo) {
        if (!file_exists($archivo)) 
            continue;

        $f = fopen($archivo, "r");
        while (($linea = fgets($f)) !== false) {
            $linea = trim($linea);
            if ($linea === "") 
                continue;

            if (strpos($linea, $matricula) === 0) {
                $tipoVehiculo = $tipo;
                break 2;
            }
        }
        fclose($f);
    }

    if ($tipoVehiculo === "residentes" || $tipoVehiculo === "servicios") continue;

    if ($tipoVehiculo === "logistica") {
        $hora_num = intval(substr($hora, 0, 2));
        if ($hora_num < 6 || $hora_num > 11)
            $infractores[] = $v;
        continue;
    }

    $infractores[] = $v;
}

// Mostrar
echo"<h1>El listado de infractores</h1>";
foreach ($infractores as $i) {
    echo implode(" ", $i) . "<br>";
}







?>