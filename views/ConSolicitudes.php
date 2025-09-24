<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelCita.php");
require_once("../controllers/mostrarCitas.php");
require_once("../controllers/seguridadConcesionaria.php");


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Solicitudes || AutoMarket</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>

<body>
    <main class="dashboard solicitudes concesionaria">
        <header>
            <h2>Administrar Solicitudes</h2>
            <a href="ConDashboard.php" class="back"></a>
            <a href="../controllers/cerrarSesion.php" class="close"></a>
        </header>
        <table>
            <?php
            
                cargarCitas();
            
            ?>
        </table>
    </main>
</body>

</html>