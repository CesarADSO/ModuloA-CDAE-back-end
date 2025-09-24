<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelVehiculo.php");
require_once("../controllers/mostrarVehiculos.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cliente || AutoMarket</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>

<body>
    <main class="dashboard concesionaria cliente">
        <header>
            <h2>Vehículos Disponibles</h2>
            
            <a href="index.html" class="close"></a>
        </header>

        <div class="contCards">
            
            <?php
            
                cargarVehiculosCliente();
            
            ?>
            

        </div>

    </main>
</body>

</html>