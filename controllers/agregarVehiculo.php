<?php

// IMPORTAMOS LAS DEPENDENCIAS NECESARIAS

require_once("../models/conexion.php");
require_once("../models/modelVehiculo.php");

// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS A TRAVÉS DEL FORMULARIO A TRAVÉS DEL METHOD POST Y LOS NAME DE LOS CAMPOS
// TRAEMOS EL ID DE LA CONCESIONARIA A TRAVÉS DE LA SESIÓN
$idConcesionaria = $_SESSION['id'];
// SEGUIMOS NORMALMENTE
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$kilometraje = $_POST['Kilometraje'];
$precio = $_POST['precio'];
$ciudad = $_POST['ciudad'];

// FOTO PRIMARIA
$nombreOriginal = $_FILES['fotoPrimaria']['name'];

$directorio = "../uploads/vehiculos/";

$nombreBase = pathinfo($nombreOriginal, PATHINFO_FILENAME);
$extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

$nombreUnico = $nombreBase . "_" . time() . "." . $extension;

$ruta_foto = $directorio . $nombreUnico;

$moverArchivo = move_uploaded_file($_FILES['fotoPrimaria']['tmp_name'], $ruta_foto);

// FOTO SECUNDARIA

$nombreOriginal = $_FILES['fotoSecundaria']['name'];

$directorio = "../uploads/vehiculos/";

$nombreBase = pathinfo($nombreOriginal, PATHINFO_FILENAME);
$extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

$nombreUnico = $nombreBase . "_" . time() . "." . $extension;

$ruta_foto2 = $directorio . $nombreUnico;

$moverArchivo = move_uploaded_file($_FILES['fotoSecundaria']['tmp_name'], $ruta_foto2);

// FOTO TERCIARIA

$nombreOriginal = $_FILES['fotoTerciaria']['name'];

$directorio = "../uploads/vehiculos/";

$nombreBase = pathinfo($nombreOriginal, PATHINFO_FILENAME);
$extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

$nombreUnico = $nombreBase . "_" . time() . "." . $extension;

$ruta_foto3 = $directorio . $nombreUnico;

$moverArchivo = move_uploaded_file($_FILES['fotoTerciaria']['tmp_name'], $ruta_foto3);

// INSTANCIAMOS UNA CLASE
$objetoVehiculo = new Vehiculo();
$objetoVehiculo->registrarVehiculo($idConcesionaria, $marca, $modelo, $anio, $kilometraje, $precio, $ciudad, $ruta_foto, $ruta_foto2, $ruta_foto3);


?>