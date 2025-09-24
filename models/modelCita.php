<?php

class Cita {
    public function registrarCita($idCliente, $idVehiculo, $fecha, $hora, $estado) {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();


        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $registrar = "INSERT INTO citas (cliente_id, vehiculo_id, fecha, hora, estado) VALUES ($idCliente, $idVehiculo, '$fecha', '$hora', '$estado')";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS
        $resultado = $conexion->prepare($registrar);
        $resultado->execute();

        //NOTIFICAMOS Y REDIRECCIONAMOS
        echo '<script>alert("Cita Agendada correctamente")</script>';
        echo '<script>location.href="../views/clientDashboard.php"</script>';
    }

    public function consultarCitas() {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $consultar = "SELECT vehiculos.*, citas.id AS id_de_la_cita, clientes.nombre AS nombre_usuario, citas.fecha, citas.hora FROM citas INNER JOIN clientes ON citas.cliente_id = clientes.id INNER JOIN vehiculos ON citas.vehiculo_id = vehiculos.id ";

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

    public function consultarCita ($id_cita) {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR

        $consultar = "SELECT vehiculos.*, clientes.nombre AS nombre_usuario, clientes.email, citas.id AS id_de_la_cita, citas.fecha, citas.hora FROM citas INNER JOIN clientes ON citas.cliente_id = clientes.id INNER JOIN vehiculos ON citas.vehiculo_id = vehiculos.id WHERE citas.id = $id_cita";

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

    public function actualizarEstado($id_cita, $estado) {
        // CREAMOS EL OBJETO DE LA CONEXIÓN
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        // DEFINIMOS EN UNA VARIABLE LA CONSULTA SQL A EJECUTAR
        $actualizar = "UPDATE citas SET estado = '$estado' WHERE id = $id_cita";

        // PREPARAMOS LA ACCIÓN A EJECUTAR Y LA EJECUTAMOS
        $resultado = $conexion->prepare($actualizar);
        $resultado->execute();

        //NOTIFICAMOS Y REDIRECCIONAMOS
        switch ($estado) {
            case 'APROBADA':
                echo '<script>alert("Cita Aprobada Correctamente")</script>';
                break;
            
            case 'RECHAZADA':
                echo '<script>alert("Cita Rechazada Correctamente")</script>';
                break;
        }
        echo '<script>location.href="../views/conSolicitudes.php"</script>';
    }
}






?>