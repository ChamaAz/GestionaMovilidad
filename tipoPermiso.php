<?php
// mobility_form.php
// Formulario para seleccionar el tipo de permiso de movilidad
?>

<div style="text-align: center; margin-top: 50px; font-family: Arial, sans-serif;">
    <h1 style="color: #333;">GESTIONAR LA MOVILIDAD</h1>
    <h3 style="background-color: #ADD8E6; padding: 10px; border-radius: 8px;">
        ELIGE EL TIPO DE PERMISO
    </h3>

    <!-- Formulario principal -->
    <form action="FormularioEntrada.php" method="post" style="margin-top: 30px;">
        <select name="tipo" style="
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 250px;
            text-align: center;
        ">
            <option value="">---------SELECCIONA----------</option>
            <?php
            // Abrimos el fichero permisos.txt para obtener los tipos de permiso
            $fichero = fopen('permisos.txt','r');
            if(!$fichero){
                die("<p style='color:red;'>No se puede abrir el fichero de permisos.</p>");
            }

            // Leemos línea por línea y generamos las opciones del select
            while(($lenia = fgets($fichero)) !== false){
                $lenia = trim($lenia);
                if($lenia !== ""){
                    echo "<option value='".htmlspecialchars($lenia)."'>".htmlspecialchars($lenia)."</option>";
                }
            }

            fclose($fichero);
            ?>
        </select>
        <br><br>

        <!-- Botón de enviar -->
        <input type="submit" value="Enviar" style="
            padding: 10px 30px;
            font-size: 16px;
            border-radius: 8px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        "
        onmouseover="this.style.backgroundColor='#45a049'; this.style.transform='scale(1.05)';"
        onmouseout="this.style.backgroundColor='#4CAF50'; this.style.transform='scale(1)';">
    </form>

    <!-- Mensaje de validación simple (opcional) -->
    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(empty($_POST['tipo'])){
            echo "<p style='color:red; margin-top: 20px;'>Por favor selecciona un tipo de permiso antes de enviar.</p>";
        } else {
            echo "<p style='color:green; margin-top: 20px;'>Has seleccionado: <strong>".htmlspecialchars($_POST['tipo'])."</strong></p>";
        }
    }
    ?>
</div>