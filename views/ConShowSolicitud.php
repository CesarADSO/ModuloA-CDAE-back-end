
<?php
// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelCita.php");
require_once("../controllers/mostrarCitas.php");


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitud || AutoMarket</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>

<body>
    <main class="show concesionaria dashboard">
        <header>
            <h2>Consultar Solicitud</h2>
            <a href="ConSolicitudes.php" class="back"></a>
            <a href="index.html" class="close"></a>
        </header>

        <?php
        
            cargarCita();
       
        ?>


    </main>
</body>

</html>