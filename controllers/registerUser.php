<?php
//IMPORTAMOS LAS DEPENDENCIAS NECESARIAS

require_once("../models/conexion.php");
require_once("../models/modelUserRegistro.php");

// CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS A TRAVÉS DEL FORMULARIO A TRAVÉS DEL METHOD POST Y LOS NAME DE LOS CAMPOS

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

$nombreOriginal = $_FILES['foto']['name'];

$directorio = "../uploads/logos/";

$nombreBase = pathinfo($nombreOriginal, PATHINFO_FILENAME);

$extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);

$nombreUnico = $nombreBase ."_" . time() . ".". $extension;

$ruta_foto = $directorio . $nombreUnico;

$moverArchivo = move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto);

// ENCRIPTAMOS LA CONTRASEÑA ANTES DE ENVIARLA AL MODELO
$clave = password_hash($clave, PASSWORD_DEFAULT);

// INSTANCIAMOS UNA CLASE

$objetoUsuario = new Usuario();
$objetoUsuario->registrarUsuario($nombre, $email, $clave, $rol, $ruta_foto);

?>