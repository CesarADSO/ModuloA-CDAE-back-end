<?php


    function cargarCitas()
{
    // CREAMOS EL OBJETO DE NUESTRA CLASE PRINCIPAL CITA
    $citas = new Cita();
    $datos = $citas->consultarCitas();

    //VERIFICAMOS QUE ESTA VARIABLE $datos POSEA INFORMACION A TRAVES DE UN IF
    if (!isset($datos)) {
        echo "<h2>NO HAY CITAS AGENDADAS</h2>";
    } else {
        foreach ($datos as $f) {
            //CONCATENAMOS CON EL '..'
            echo '
            <tr>
                <td>
                    <figure class="photo">
                        <img src="'.$f['imagen_destacada'].'" width=100px alt="">
                    </figure>
                    <div class="info">
                        <h3>'.$f['marca'].' - '.$f['modelo'].'</h3>                        
                        <p>'.$f['ciudad'].' - '.$f['precio'].'</p>
                        <p>'.$f['nombre_usuario'].'</p>
                        <p>'.$f['fecha'].' - '.$f['hora'].'</p>
                    </div>
                    <div class="controls">
                        <a href="conShowSolicitud.php?idCita='.$f['id_de_la_cita'].'" class="show"></a>
                    </div>
                </td>
            </tr>
                ';
        }
    }
}



?>