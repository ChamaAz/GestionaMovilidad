<div style="text-align: center; margin-top: 50px; font-family: Arial, sans-serif;">
    <h1 style="color: #333;">GESTIONAR DE LA MOVILIDAD</h1>
    <h3 style="background-color: lightblue; padding: 10px; border-radius: 8px;">ELIGIR EL TIPO DEL PERMISO</h3>

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
            $fichero = fopen('permisos.txt','r');
            if(!$fichero){
                die("No se puede abrir el fichero");
            }

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
</div>
