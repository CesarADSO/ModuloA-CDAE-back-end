<?php

class Usuario
{
    public function registrarUsuario($nombre, $email, $clave, $rol, $ruta_foto)
    {

        // CREAMOS EL OBJETO DE LA CONEXION
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        //DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        switch ($rol) {
            case 1:
                $registarCliente = "INSERT INTO clientes (nombre, email, clave) VALUES ('$nombre', '$email', '$clave')";
                $resultado = $conexion->prepare($registarCliente);
                $resultado->execute();
                break;

            case 2:
                $registrarConcesionario = "INSERT INTO concesionarias (nombre, email, clave, imagen_logo) VALUES ('$nombre', '$email', '$clave', '$ruta_foto')";
                $resultado2 = $conexion->prepare($registrarConcesionario);
                $resultado2->execute();
                break;
        }

        echo '<script>alert("Registro Exitoso")</script>';
        echo '<script>location.href="../views/index.php"</script>';
    }
};
