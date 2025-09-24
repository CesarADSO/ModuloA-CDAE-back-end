<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelVehiculo.php");
require_once("../controllers/mostrarVehiculos.php");
require_once("../controllers/seguridadCliente.php");



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Vechículo - AutoMarket</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>
<body>
    <main class="show concesionaria dashboard cliente">
        <header>
            <h2>Consultar Vehículo</h2>
            <a href="ClientDashboard.php" class="back"></a>
            <a href="../controllers/cerrarSesion.php" class="close"></a>
        </header>
        <?php

            cargarVehiculoCliente();
        
        ?>
        
    </main>

    <script>
        const images = document.querySelectorAll('.photo-preview img');
        let current = 0;

        // Inicializar la primera imagen como activa
        images[current].classList.add('active');

        setInterval(() => {
            // Quitar clase activa de la imagen actual
            images[current].classList.remove('active');

            // Calcular la siguiente imagen
            current = (current + 1) % images.length;

            // Agregar clase activa a la nueva imagen
            images[current].classList.add('active');
        }, 4000);
    </script>


</body>
</html>