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
                        <p>'.$f['ciudad'].' - $ '.$f['precio'].'</p>
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

function cargarCita()
{
    // CAPTURAMOS LA PK ENVIADA POR LA URL A TRAVÉS DEL METHOD GET
    $id_cita = $_GET['idCita'];
    $objetoCita = new Cita;
    $resultado = $objetoCita->consultarCita($id_cita);

    foreach ($resultado as $f) {
        echo '
            
            <figure class="photo-preview">
            <img src="'.$f['imagen_destacada'].'" alt="">
            </figure>
        <div class="cont-details">
            <div class="cont-veh">
                <h3 class="datos-c">DATOS VEHICULO</h3>
                <article class="info-name" style="display:none;">
                    <div class="data">
                        <div class="title">Id:</div>
                        <p>'.$f['id_de_la_cita'].'</p>
                    </div>
                </article>

                <article class="info-name">
                    <div class="data">
                        <div class="title">Marca:</div>
                        <p>'.$f['marca'].'</p>
                    </div>
                </article>

                <article class="info-name">
                    <div class="data">
                        <div class="title">Modelo:</div>
                        <p>'.$f['modelo'].'</p>
                    </div>
                </article>

                <article class="info-name">
                    <div class="data">
                        <div class="title">Precio:</div>
                        <p>'.$f['precio'].'</p>
                    </div>
                </article>

                <article class="info-name">
                    <div class="data">
                        <div class="title">Año:</div>
                        <p>'.$f['anio'].'</p>
                    </div>
                </article>

                <article class="info-name">
                    <div class="data">
                        <div class="title">Ciudad:</div>
                        <p>'.$f['ciudad'].'</p>
                    </div>
                </article>

                
                <br>
                <hr>
                <br>
                <h3 class="datos-c">DATOS SOLICITUD</h3>
                 <article class="info-name">
                    <div class="data">
                        <div class="title">Cliente:</div>
                        <p>'.$f['nombre_usuario'].'</p>
                    </div>
                </article>

                <article class="info-name">
                    <div class="data">
                        <div class="title">Correo:</div>
                        <p>'.$f['email'].'</p>
                    </div>
                </article>
                <article class="info-name">
                    <div class="data">
                        <div class="title">Fecha:</div>
                        <p>'.$f['fecha'].'</p>
                    </div>
                </article>
                <article class="info-name">
                    <div class="data">
                        <div class="title">Hora:</div>
                        <p>'.$f['hora'].'</p>
                    </div>
                </article>

               

                
                <a href="../controllers/actualizarEstadoAprobado.php?idCita='.$f['id_de_la_cita'].'" class="aceptar-solicitud">ACEPTAR</a>
                <a href="../controllers/actualizarEstadoRechazado.php?idCita='.$f['id_de_la_cita'].'" class="rechazar-solicitud">RECHAZAR</a>
            </div>
            
            
        </div>
        
        ';
}
}

?>