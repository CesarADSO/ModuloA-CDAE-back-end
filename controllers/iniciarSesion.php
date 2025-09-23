 <?php
 
    // IMPORTAMOS LAS DEPENDENCIAS NECESARIAS
    require_once("../models/conexion.php");
    require_once("../models/modelLogin.php");

    // CAPTURAMOS EN VARIABLES LOS DATOS ENVIADOS A TRAVÉS DEL FORMULARIO A TRAVÉS DEL METHOD POST Y LOS NAME DE LOS CAMPOS
    $rol = $_POST['rol'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    // INSTANCIAMOS UNA CLASE
    $objetoLogin = new Login();
    $objetoLogin->ingresar($rol, $email, $clave);
 
 
 ?>