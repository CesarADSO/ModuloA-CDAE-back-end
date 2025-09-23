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
    <title>Editar Vehículo || AutoMarket</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>
<body>
    <main class="edit dashboard concesionaria">
        <header>
            <h2>Modificar Vehículo</h2>
            <a href="ConVehiculos.php" class="back"></a>
            <a href="index.html" class="close"></a>
        </header>
        <form>
            
            <?php
            
                cargarVehiculo();
            
            ?>
        </form>
    </main>
</body>
</html>