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
}






?>