<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelCita.php");


// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS A TRAVÉS DEL FORMULARIO A TRAVÉS DEL METHOD POST Y LOS NAME DE LOS CAMPOS
session_start();
$idCliente = $_SESSION['id'];
$idVehiculo = $_POST['idVehiculo'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$estado = "PENDIENTE";

// INSTANCIAMOS LA CLASE CITA
$objetoCita = new Cita();
$objetoCita->registrarCita($idCliente, $idVehiculo, $fecha, $hora, $estado);


?>