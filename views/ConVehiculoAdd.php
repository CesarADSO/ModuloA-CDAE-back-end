<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../controllers/seguridadConcesionaria.php");


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vehículo || AutoMarket</title>
    <link rel="stylesheet" href="../assets/css/master.css">
</head>

<body>
    <main class="add concesionaria">
        <header>
            <h2>Registrar Vehículo</h2>
            <a href="ConVehiculos.php" class="back"></a>
            <a href="../controllers/cerrarSesion.php" class="close"></a>
        </header>
        <form action="../controllers/agregarVehiculo.php" method="post" enctype="multipart/form-data">
            
            <input type="text" name="marca" placeholder="Marca...">
            <input type="text" name="modelo" placeholder="Modelo...">
            <input type="number" name="anio" placeholder="Año...">
            <input type="number" name="Kilometraje" placeholder="Kilometraje ...">
            <input type="number" name="precio" placeholder="Precio ...">
            <div class="select">
                <select name="ciudad">
                    <option value="" disabled selected hidden>Ciudad...</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Bogotá">Bogotá</option>
                    <option value="Bucaramanga">Bucaramanga</option>
                    <option value="Manizales">Manizales</option>
                    <option value="Medellín">Medellín</option>
                    <option value="Cali">Cali</option>
                </select>
            </div>
            
            <p>Foto Destacada:</p>
            <input type="file" name="fotoPrimaria" class="upload" aria-describedby="Foto Vehiculo">
            <p>Foto Secundaria:</p>
            <input type="file" name="fotoSecundaria" class="upload" aria-describedby="Foto Vehiculo">
            <p>Foto Terciaria:</p>
            <input type="file" name="fotoTerciaria" class="upload" aria-describedby="Foto Vehiculo">
            
            <button type="submit" class="btn-home">Guardar</button>
        </form>
    </main>
</body>

</html>