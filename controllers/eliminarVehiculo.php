<?php
// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelVehiculo.php");

// CAPTURAMOS EN UNA VARIABLE LA PK ENVIADA POR LA URL DEL PASO ANTERIOR A TRAVÉS DEL METHOD GET

$id_vh = $_GET['idVehiculo'];

// INTANCIAMOS NUESTRA CLASE VEHICULO
$objetoVehiculo = new Vehiculo();
$objetoVehiculo->eliminarVehiculo($id_vh);




?>