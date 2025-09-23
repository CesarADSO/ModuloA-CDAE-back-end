<?php

    function cargarVehiculos () {
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
                        <img src="'.$f['imagen_destacada'].'" width= 100px alt="Imagen de vehiculo">
                    </figure>
                    <div class="info">
                        <h3>'.$f['marca'].'</h3>
                        <h4>'.$f['precio'].'</h4>
                        <p>'.$f['ciudad'].' - '.$f['kilometraje'].'</p>
                    </div>
                    <div class="controls">
                        
                        <a href="ConVehiculoEdit.html" class="edit"></a>
                        <a href="#" class="delete"></a>
                    </div>
                </td>
            </tr>
                
                ';
        }
    }
    }





?>