<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parqueadero FERRARA P.H</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 50px;
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
            color: #555;
        }
        .button {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 10px auto;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Parqueadero FERRARA P.H</h1>
        <a href="listar.php" class="button">Listar Vehículos</a>
        <a href="registro.php" class="button">Registrar Entrada</a>
        <a href="salida.php" class="button">Registrar Salida</a>
	<a href="consulta.php" class="button">Consultas</a>
    </div>
</body>
</html>
