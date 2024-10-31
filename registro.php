<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo</title>
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
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            margin-bottom: 5px;
        }
        input[type="text"], select, input[type="submit"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .button {
            text-align: center;
            text-decoration: none;
            display: block;
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function determineVehicleType() {
            const placaInput = document.getElementById('placa');
            let placa = placaInput.value.toUpperCase();
            placaInput.value = placa; // Convertir la placa a mayúsculas

            const tipoInput = document.getElementById('tipo');
            const carPattern = /^[A-Z]{3}\d{3}$/;
            const motoPattern = /^[A-Z]{3}\d{2}[A-Z]{1}$/;

            if (carPattern.test(placa)) {
                tipoInput.value = 'Carro';
            } else if (motoPattern.test(placa)) {
                tipoInput.value = 'Moto';
            } else {
                tipoInput.value = '';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Registrar Vehículo</h1>
        <form method="post" action="entrada.php" oninput="determineVehicleType()">
            <label>Placa:</label>
            <input type="text" name="placa" id="placa" required oninput="determineVehicleType()">
            <label>Tipo de Vehículo:</label>
            <select name="tipo" id="tipo" required>
                <option value="">Ingrese Placa Para Determinar Tipo Automaticamente</option>
                <option value="Carro">Carro</option>
                <option value="Moto">Moto</option>
            </select>
            <input type="submit" value="Registrar">
        </form>
        <a href="index.php" class="button">Regresar al Inicio</a>
    </div>
</body>
</html>
