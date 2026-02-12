<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    width: 350px;
    display: flex;
    flex-direction: column;
}

form h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

label {
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 5px;
    color: #555;
}

input[type="date"] {
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    width: 100%;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

input[type="submit"]:hover {
    background-color: #45a049;
    transform: scale(1.05);
}
</style>
<form action="listadoInfractores.php" method="post">
    <h2>Rango de fechas</h2>
    <label>Fecha inicio</label>
    <input type="date" name="fecha_inicio" required>
    
    <label>Fecha fin</label>
    <input type="date" name="fecha_fin" required>
    
    <input type="submit" value="Generar listado">
</form>
