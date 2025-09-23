<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelVehiculo.php");
require_once("../controllers/mostrarVehiculos.php");
require_once("../controllers/seguridad.php");




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Vehículos || AutoMarket</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>

<body>
    <main class="dashboard concesionaria">
        <header>
            <h2>Gestionar Vehículos</h2>
            <a href="ConDashboard.php" class="back"></a>
            <a href="index.html" class="close"></a>
        </header>
        <a href="ConVehiculoAdd.html" class="btn-home adicionar">+ Agregar nuevo vehículo</a>
        <table>
            <?php
            
            cargarVehiculos ();
            
            
            ?>
        </table>
    </main>
</body>

</html>