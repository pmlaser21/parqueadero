<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Registros de Vehículos</title>
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
            justify-content: space-between;
            margin-bottom: 20px;
        }
        label {
            margin: 10px;
        }
        input[type="date"], input[type="submit"], .button {
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
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Consultar Registros de Vehículos</h1>
        <form method="post" action="">
            <label>Fecha:</label>
            <input type="date" name="fecha" required>
            <input type="submit" value="Buscar">
        </form>
        <form method="post" action="">
            <input type="hidden" name="listar_todos" value="1">
            <input type="submit" value="Listar Todos los Registros">
        </form>

        <?php
        include 'conexion.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['listar_todos'])) {
                $sql = "SELECT * FROM vehiculos";
                $listar_todos = true;
            } else {
                $fecha = $_POST['fecha'];
                $sql = "SELECT * FROM vehiculos WHERE DATE(hora_entrada) = '$fecha'";
                $listar_todos = false;
            }

            $result = $conexion->query($sql);
            $total_cobrado = 0;

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>Tipo</th>
                            <th>Hora de Entrada</th>
                            <th>Hora de Salida</th>
                            <th>Valor Cobrado</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['placa']}</td>
                            <td>{$row['tipo']}</td>
                            <td>{$row['hora_entrada']}</td>
                            <td>{$row['hora_salida']}</td>
                            <td>{$row['valor_cobrado']}</td>
                          </tr>";
                    if (!$listar_todos) {
                        $total_cobrado += $row['valor_cobrado'];
                    }
                }
                if (!$listar_todos) {
                    echo "<tr class='total'>
                            <td colspan='5'>Total Cobrado en el Día</td>
                            <td>{$total_cobrado}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<div class='message error'>No se encontraron registros.</div>";
            }
        }

        $conexion->close();
        ?>
	<br>
        <a href="index.php" class="button">Regresar al Inicio</a>
    </div>
</body>
</html>
