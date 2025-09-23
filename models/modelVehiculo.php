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
        echo '<script>location.href="../views/conVehiculos.php"</script>';
    }


    public function consultarVehiculos () {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $consultar = "SELECT * FROM vehiculos";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS 
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        //AGREGAMOS UN BUCLE WHILE PARA PODER CONVERTIR ESA CADENA DE INFORMACION EN UN ARREGLO DE DATOS QUE PODAMOS MANIPULAR GRACIAS AL FETCH
        while ($dato = $resultado-> fetch()) {
            $f[] = $dato;
        }
        // RETORNAMOS $f
        return $f;
    }
};






?>