<?php

class Vehiculo
{
    public function registrarVehiculo($idConcesionaria, $marca, $modelo, $anio, $kilometraje, $precio, $ciudad, $ruta_foto, $ruta_foto2, $ruta_foto3)
    {
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


    public function consultarVehiculos()
    {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $consultar = "SELECT * FROM vehiculos ORDER BY id DESC";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS 
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();


        // INICIALIZAMOS F COMO UN ARREGLO VACIO PARA EVITAR EL WARNING AL NO TENER VEHICULOS REGISTRADOS
        $f = [];

        //AGREGAMOS UN BUCLE WHILE PARA PODER CONVERTIR ESA CADENA DE INFORMACION EN UN ARREGLO DE DATOS QUE PODAMOS MANIPULAR GRACIAS AL FETCH
        while ($dato = $resultado->fetch()) {
            $f[] = $dato;
        }
        // RETORNAMOS $f
        return $f;
    }


    public function eliminarVehiculo($id_vh) {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR
        $eliminar = "DELETE FROM vehiculos WHERE id = $id_vh";

        // PREPARAMOS LA ACCIÓN A EJEUCUTAR Y LA EJECUTAMOS
        $resultado = $conexion->prepare($eliminar);
        $resultado->execute();

        // NOTIFICAMOS Y REDIRECCIONAMOS A LA INTERFAZ
        echo '<script>alert("Vehiculo Eliminado Correctamente")</script>';
        echo '<script>location.href="../views/conVehiculos.php"</script>';

    }

    public function consultarVehiculo ($id_vh) {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $consultar = "SELECT * FROM vehiculos WHERE id = $id_vh";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS 
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        //AGREGAMOS UN BUCLE WHILE PARA PODER CONVERTIR ESA CADENA DE INFORMACION EN UN ARREGLO DE DATOS QUE PODAMOS MANIPULAR GRACIAS AL FETCH
        while ($dato = $resultado->fetch()) {
            $f[] = $dato;
        }
        // RETORNAMOS $f
        return $f;
    }

    public function actualizarVehiculo ($id, $marca, $modelo, $anio, $kilometraje, $precio, $ciudad) {
        // CREAMOS EL OBJETO DE LA CONEXION
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();


        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR
        $actualizar = "UPDATE vehiculos SET marca = '$marca', modelo = '$modelo', anio = $anio, kilometraje = $kilometraje, precio = $precio, ciudad = '$ciudad' WHERE id = $id";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS
        $resultado = $conexion->prepare($actualizar);
        $resultado->execute();

        // NOTIFICAMOS Y REDIRECCIONAMOS
        echo '<script>alert("Vehiculo Actualizado Correctamente")</script>';
        echo '<script>location.href="../views/conVehiculos.php"</script>';
    }

    public function consultarVehiculosCliente()
    {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $consultar = "SELECT vehiculos.*, concesionarias.nombre, concesionarias.imagen_logo FROM vehiculos INNER JOIN concesionarias ON vehiculos.concesionaria_id = concesionarias.id ORDER BY vehiculos.id DESC";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS 
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        // INICIALIZAMOS F COMO UN ARREGLO VACIO PARA EVITAR EL WARNING AL NO TENER VEHICULOS REGISTRADOS
        $f= [];

        //AGREGAMOS UN BUCLE WHILE PARA PODER CONVERTIR ESA CADENA DE INFORMACION EN UN ARREGLO DE DATOS QUE PODAMOS MANIPULAR GRACIAS AL FETCH
        while ($dato = $resultado->fetch()) {
            $f[] = $dato;
        }
        // RETORNAMOS $f
        return $f;
    }

    public function consultarVehiculoCliente ($id_vh) {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $consultar = "SELECT vehiculos.*, concesionarias.nombre AS nombre_concesionaria FROM vehiculos INNER JOIN concesionarias ON vehiculos.concesionaria_id = concesionarias.id  WHERE vehiculos.id = $id_vh";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS 
        $resultado = $conexion->prepare($consultar);
        $resultado->execute();

        //AGREGAMOS UN BUCLE WHILE PARA PODER CONVERTIR ESA CADENA DE INFORMACION EN UN ARREGLO DE DATOS QUE PODAMOS MANIPULAR GRACIAS AL FETCH
        while ($dato = $resultado->fetch()) {
            $f[] = $dato;
        }
        // RETORNAMOS $f
        return $f;
    }
};
