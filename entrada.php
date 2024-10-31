<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vehículos</title>
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
        <h1>Registro de Vehículos</h1>
        <?php
        include 'conexion.php';

        $placa = strtoupper($_POST['placa']);
        $tipo = $_POST['tipo'];

        // Verificar si la placa ya está registrada y no ha salido
        $check_sql = "SELECT * FROM vehiculos WHERE placa = '$placa' AND hora_salida IS NULL";
        $check_result = $conexion->query($check_sql);

        if ($check_result->num_rows > 0) {
            echo "<div class='message error'>Error: El vehículo con placa $placa ya está registrado en el parqueadero y no ha salido. Serás redirigido en 3 segundos...</div>";
            header("refresh:3;url=index.php");
        } else {
            $sql = "INSERT INTO vehiculos (placa, tipo) VALUES ('$placa', '$tipo')";
            if ($conexion->query($sql) === TRUE) {
                echo "<div class='message success'>Vehículo registrado exitosamente. Serás redirigido en 3 segundos...</div>";
                header("refresh:3;url=index.php");
            } else {
                echo "<div class='message error'>Error: " . $sql . "<br>" . $conexion->error . " Serás redirigido en 3 segundos...</div>";
                header("refresh:3;url=index.php");
            }
        }

        $conexion->close();
        ?>

    </div>
</body>
</html>
