<?php
//IMPORTAMOS LAS DEPENDENCIAS NECESARIAS

require_once("../models/conexion.php");
require_once("../models/modelUserRegistro");

// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS A TRAVÉS DEL FORMULARIO A TRAVÉS DEL METHOD POST Y LOS NAME DE LOS CAMPOS

$nombres = $POST['nombres'];
$email = $POST['email'];
$clave = $POST['clave'];
$rol = $POST['rol'];

$nombreOriginal = $_FILES['foto']['name'];

$directorio = "../uploads/logos/";

$nombreBase = pathinfo($nombreOriginal, PATHINFO_FILENAME);

$extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

$nombreUnico = $nombreBase ."_" . time() . ".". $extension;

$ruta_foto = $directorio . $nombreUnico;

$moverArchivo = move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto);

// INSTANCIAMOS UNA CLASE

$objetoUsuario = new Usuario();
$objetoUsuario->registrarUsuario($nombres, $email, $clave, $rol, $ruta_foto);

?>