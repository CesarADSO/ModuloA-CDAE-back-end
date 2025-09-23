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
                        <a href="../controllers/eliminarVehiculo.php?idVehiculo=' . $f['id'] . '" class="delete"></a>
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


        ';
    }
}
