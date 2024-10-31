<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salida de Vehículos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #555;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            margin-bottom: 5px;
        }
        input[type="number"], input[type="submit"], .button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        input[type="submit"], .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover, .button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .message {
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .success {
            background-color: #e7f3fe;
            border: 1px solid #b3d4fc;
        }
        .error {
            background-color: #fce4e4;
            border: 1px solid #fcc2c3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Salida de Vehículos</h1>
        <form method="post" action="registrar_salida.php">
            <label>ID del Vehículo:</label>
            <input type="number" name="id" required><br>
            <input type="submit" value="Registrar Salida">
        </form>
        
        <h2>Vehículos en el Parqueadero</h2>
        <?php
        include 'conexion.php';

        $sql = "SELECT * FROM vehiculos WHERE hora_salida IS NULL";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Tipo</th>
                        <th>Hora de Entrada</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['placa']}</td>
                        <td>{$row['tipo']}</td>
                        <td>{$row['hora_entrada']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='message error'>No hay vehículos en el parqueadero.</div>";
        }

        $conexion->close();
        ?>
	<br>
        <a href="index.php" class="button">Regresar al Inicio</a>
    </div>
</body>
</html>
