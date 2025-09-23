<?php

class Login
{
    public function ingresar($rol, $email, $clave)
    {
        // CREAMOS EL OBJETO DE LA CONEXIÓN

        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // CONVERTIMOS EL VALUE DEL ROL A TEXTO
        $rolTexto = ($rol == 1) ? "Cliente" : "Concesionaria";

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        switch ($rol) {
            case 1:
                $consultar = "SELECT * FROM clientes WHERE email = '$email'";
                $resultado = $conexion->prepare($consultar);
                $resultado->execute();

                // VALIDAMOS EL CORREO Y SEGMENTAMOS LA CADENA DE $resultado A TRAVÉS DEL FETCH

                if ($f = $resultado->fetch()) {

                    // VALIDAMOS LA CLAVE 
                    if ($f['clave'] == $clave) {

                        // SE INICIA SESIÓN
                        session_start();

                        //SE CREAN VARIABLES GLOBALES O DE SESIÓN
                        $_SESSION['id'] = $f['id'];
                        $_SESSION['autenticado'] = "SI";

                        echo '<script>alert("Bievenido ' . $rolTexto . ' ' . $f['nombre'] . '")</script>';
                        echo '<script>location.href="../views/clientDashboard.html"</script>';
                    } else {
                        echo '<script>alert("La contraseña ingresada no es la correcta")</script>';
                        echo '<script>location.href="../views/login.html"</script>';
                    }
                } else {
                    echo '<script>alert("El correo ingresado no es el correcto")</script>';
                    echo '<script>location.href="../views/login.html"</script>';
                }

                break;

            case 2:
                $consultar2 = "SELECT * FROM concesionarias WHERE email = '$email'";
                $resultado2 = $conexion->prepare($consultar2);
                $resultado2->execute();

                // VALIDAMOS EL CORREO Y SEGMENTAMOS LA CADENA DE $resultado A TRAVÉS DEL FETCH

                if ($f = $resultado2->fetch()) {

                    // VALIDAMOS LA CLAVE 
                    if ($f['clave'] == $clave) {

                        // SE INICIA SESIÓN
                        session_start();

                        //SE CREAN VARIABLES GLOBALES O DE SESIÓN
                        $_SESSION['id'] = $f['id'];
                        $_SESSION['autenticado'] = "SI";

                        echo '<script>alert("Bievenida ' . $rolTexto . ' ' . $f['nombre'] . '")</script>';
                        echo '<script>location.href="../views/conDashboard.html"</script>';
                    } else {
                        echo '<script>alert("La contraseña ingresada no es la correcta")</script>';
                        echo '<script>location.href="../views/login.html"</script>';
                    }
                } else {
                    echo '<script>alert("El correo ingresado no es el correcto")</script>';
                    echo '<script>location.href="../views/login.html"</script>';
                }
                break;
        }
    }
};
