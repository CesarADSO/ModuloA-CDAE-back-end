<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS

require_once("../models/conexion.php");
require_once("../models/modelVehiculo.php");
require_once("../controllers/mostrarVehiculos.php");

// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS A TRAVÉS DEL FORMULARIO A TRAVÉS DEL METHOD POST Y LOS NAME DE LOS CAMPOS
$id = $_POST['id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$kilometraje = $_POST['kilometraje'];
$precio = $_POST['precio'];
$ciudad = $_POST['ciudad'];

// INSTANCIAMOS NUESTRA CLASE PRINCIPAL VEHICULO
$objetoVehiculo = new Vehiculo();
$objetoVehiculo->actualizarVehiculo($id, $marca, $modelo, $anio, $kilometraje, $precio, $ciudad);




?>