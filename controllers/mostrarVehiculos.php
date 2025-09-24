<?php

function cargarVehiculos()
{
    // CREAMOS EL OBJETO DE NUESTRA CLASE PRINCIPAL VEHICULOS
    $vehiculos = new Vehiculo();
    $datos = $vehiculos->consultarVehiculos();

    //VERIFICAMOS QUE ESTA VARIABLE $datos POSEA INFORMACION A TRAVES DE UN IF
    if (!isset($datos)) {
        echo "<h2>NO HAY VEHICULOS REGISTRADOS</h2>";
    } else {
        foreach ($datos as $f) {
            //CONCATENAMOS CON EL '..'
            echo '
            <tr>
                <td>
                    <figure class="photo">
                        <img src="' . $f['imagen_destacada'] . '" width= 100px alt="Imagen de vehiculo">
                    </figure>
                    <div class="info">
                        <h3>' . $f['marca'] . '</h3>
                        <h4>' . $f['precio'] . '</h4>
                        <p>' . $f['ciudad'] . ' - ' . $f['kilometraje'] . '</p>
                    </div>
                    <div class="controls">
                        
                        <a href="conVehiculoEdit.php?idVehiculo=' . $f['id'] . '" class="edit"></a>
                        <a href="../controllers/eliminarVehiculo.php?idVehiculo=' . $f['id'] . '" class="delete" onclick="return confirm(\'¿Estás seguro de eliminar el vehículo?\');"></a>
                    </div>
                </td>
            </tr>
                
                ';
        }
    }
}

function cargarVehiculo()
{
    // CAPTURAMOS LA PK ENVIADA POR LA URL A TRAVÉS DEL METHOD GET
    $id_vh = $_GET['idVehiculo'];
    $objetoVehiculo = new Vehiculo;
    $resultado = $objetoVehiculo->consultarVehiculo($id_vh);

    foreach ($resultado as $f) {
        echo '
        <form action="../controllers/actualizarVehiculo.php" method="post">
            <input type="hidden" name="id" placeholder="Marca..." value="'.$f['id'].'">
            <input type="text" name="marca" placeholder="Marca..." value="'.$f['marca'].'">
            <input type="text" name="modelo" placeholder="Modelo..." value="'.$f['modelo'].'">
            <input type="number" name="anio" placeholder="Año..." value="'.$f['anio'].'">
            <input type="number" name="kilometraje" placeholder="Kilometraje ..." value="'.$f['kilometraje'].'">
            <input type="number" name="precio" placeholder="Precio ..." value="'.$f['precio'].'">
            <div class="select">
                <select name="ciudad">
                    <option value="'.$f['ciudad'].'" disabled selected hidden>'.$f['ciudad'].'</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Bogotá">Bogotá</option>
                    <option value="Bucaramanga">Bucaramanga</option>
                    <option value="Manizales">Manizales</option>
                    <option value="Medellín">Medellín</option>
                    <option value="Cali">Cali</option>
                </select>
            </div>
            
            <button class="btn-home" type="submit">Modificar</button>

        </form>
        ';
    }
}

function cargarVehiculosCliente () {
    // CREAMOS EL OBJETO DE NUESTRA CLASE PRINCIPAL VEHICULOS
    $vehiculos = new Vehiculo();
    $datos = $vehiculos->consultarVehiculosCliente();

    //VERIFICAMOS QUE ESTA VARIABLE $datos POSEA INFORMACION A TRAVES DE UN IF
    if (!isset($datos)) {
        echo "<h2>NO HAY VEHICULOS REGISTRADOS</h2>";
    } else {
        foreach ($datos as $f) {
            //CONCATENAMOS CON EL '..'
            echo '
                <div class="card-vehiculo">
                <img src="'.$f['imagen_destacada'].'"  alt="">
                <div class="info-card">
                    <img src="'.$f['imagen_logo'].'" alt="">                    
                    <h2>'.$f['marca'].' - '.$f['modelo'].'</h2>
                    <h2>'.$f['precio'].'</h2>
                    <p>Año: '.$f['anio'].' - '.$f['kilometraje'].' km</p>
                    <p class="direccion">'.$f['ciudad'].' - '.$f['nombre'].'</p>
                    <a href="ClientShowVehiculo.php?idVehiculo='.$f['id'].'">Ver Más</a>
                </div>
            </div>
                
                ';
        }
    }
}

function cargarVehiculoCliente()
{
    // CAPTURAMOS LA PK ENVIADA POR LA URL A TRAVÉS DEL METHOD GET
    $id_vh = $_GET['idVehiculo'];
    $objetoVehiculo = new Vehiculo;
    $resultado = $objetoVehiculo->consultarVehiculoCliente($id_vh);

    foreach ($resultado as $f) {
        echo '
            <figure class="photo-preview slide">
            <img src="'.$f['imagen_destacada'].'" alt="">
            <img src="'.$f['imagen_apoyo_1'].'" alt="">
            <img src="'.$f['imagen_apoyo_2'].'" alt="">
        </figure>
        <div class="cont-details">
            <div class="cont-veh">
                <article class="info-name" style="display:none;">
                    <div class="data">
                        <div class="title">id:</div>
                        <p>'.$f['id'].'</p>
                    </div>
                </article>
                <article class="info-name">
                    <div class="data">
                        <div class="title">Concesionario:</div>
                        <p>'.$f['nombre_concesionaria'].'</p>
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

                <article class="info-name">
                    <div class="data">
                        <div class="title">Kilometraje:</div>
                        <p> '.$f['kilometraje'].' Km</p>
                    </div>
                </article>
                <br>
                <hr>
                <br>
                <h3 class="datos-c">AGENDAR CITA:</h3>
                <form action="">
                    <p>Fecha:</p>
                    <input type="date" class="time">
                    <p>Hora</p>
                    <input type="time" class="time" >
                    <button class="btn-home">Agendar</button>
                </form>

            </div>
        </div>
        ';
    }
}