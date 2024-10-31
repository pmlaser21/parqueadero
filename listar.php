<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vehículos</title>
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
        .button {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vehículos en el Parqueadero</h1>

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
                        <th>Hora de Salida</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['placa']}</td>
                        <td>{$row['tipo']}</td>
                        <td>{$row['hora_entrada']}</td>
                        <td>{$row['hora_salida']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='message error'>No hay vehículos en el parqueadero.</div>";
        }

        $conexion->close();
        ?>

        <a href="index.php" class="button">Regresar al Inicio</a>
    </div>
</body>
</html>
