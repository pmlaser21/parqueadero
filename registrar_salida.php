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
            max-width: 600px;
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
        <h1>Salida de Vehículos FERRARA P.H</h1>
        <?php
        include 'conexion.php';

        $id = $_POST['id'];
        $tarifa_por_hora = 2000; // Por ejemplo, 2000 pesos por hora

        // Obtener la hora de entrada del vehículo
        $sql = "SELECT hora_entrada FROM vehiculos WHERE id = $id AND hora_salida IS NULL";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hora_entrada = new DateTime($row['hora_entrada']);
            $hora_salida = new DateTime();
            $hora_salida->modify('-6 hours');

            // Calcular la diferencia de tiempo en minutos
            $intervalo = $hora_entrada->diff($hora_salida);
            $minutos_totales = ($intervalo->days * 24 * 60) + ($intervalo->h * 60) + $intervalo->i;

            if ($minutos_totales <= 30) {
                $tarifa = 0;
                echo "<div class='message success'>Primeros 30 minutos gratis.<br>";
            } else {
                // Calcular las horas después de los primeros 30 minutos
                $minutos_cobrables = $minutos_totales - 30;
                $horas_cobrables = ceil($minutos_cobrables / 60);
                $tarifa = $horas_cobrables * $tarifa_por_hora;
                echo "<div class='message success'>Total a pagar: $tarifa pesos.<br>";
            }

            // Actualizar la base de datos con la hora de salida y el valor cobrado
            $sql = "UPDATE vehiculos SET hora_salida = NOW(), valor_cobrado = $tarifa WHERE id = $id";
            if ($conexion->query($sql) === TRUE) {
                echo "Vehículo registrado con salida a las " . (new DateTime())->format('Y-m-d H:i:s') . ". Serás redirigido en 5 segundos...</div>";
                header("refresh:5;url=index.php");
            } else {
                echo "<div class='message error'>Error: " . $conexion->error . " Serás redirigido en 5 segundos...</div>";
                header("refresh:5;url=index.php");
            }
        } else {
            echo "<div class='message error'>Vehículo no encontrado o ya registrado con salida. Serás redirigido en 5 segundos...</div>";
            header("refresh:5;url=index.php");
        }

        $conexion->close();
        ?>
    </div>
</body>
</html>
