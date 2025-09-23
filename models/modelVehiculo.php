<?php

class Vehiculo {
    public function registrarVehiculo ($idConcesionaria, $marca, $modelo, $anio, $kilometraje, $precio, $ciudad, $ruta_foto, $ruta_foto2, $ruta_foto3) {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        //DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR
        $registrar = "INSERT INTO vehiculos (concesionaria_id, marca, modelo, anio, ciudad, kilometraje, precio, imagen_destacada, imagen_apoyo_1, imagen_apoyo_2) VALUES ($idConcesionaria, '$marca', '$modelo', $anio, '$ciudad', $kilometraje, $precio, '$ruta_foto', '$ruta_foto2', '$ruta_foto3')";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS

        $resultado = $conexion->prepare($registrar);
        $resultado->execute();

        // CONFIRMAMOS Y REDIRECCIONAMOS
        echo '<script>alert("Vehiculo registrado correctamente")</script>';
        echo '<script>location.href="../views/conVehiculos.html"</script>';
    }
};






?>