# parqueadero
Sistema sencillo de parqueadero en php, html y css.
Desarrollado con ayuda de Copilot, en php 8.2.12 y 10.4.32-MariaDB, dentro de la carpeta se encuentra la carpeta bd para importar la base de datos en una base llamada parqueadero utf8mb4_general_ci, bienvenidas todas las correcciones, el sistema tiene en cuenta 30 minutos gratis para empezar a cobrar un valor de 2.000 pesos por hora.

Condiciones importantes 
Se detecta como son las placas en Colombia si es de carro o de moto y actualiza el campo tipo automaticamente XXX123 Carro y XXX12X Moto.
Se detecta si la placa ingresada ya se encuentra dentro del parqueadero para evitar duplicados.
Si se escribe en minusculas el sistema guarda automaticamente en mayusculas.
