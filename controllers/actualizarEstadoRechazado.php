<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
require_once("../models/conexion.php");
require_once("../models/modelCita.php");

// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS A TRAVÉS DEL FORMULARIO A TRAVÉS DEL METHOD POST Y LOS NAME DE LOS CAMPOS
$id_cita = $_GET['idCita'];
$estado = "RECHAZADA";

// INSTANCIAMOS LA CLASE PRINCIPAL CITA
$objetoCita = new Cita();
$objetoCita->actualizarEstado($id_cita, $estado);


?>