<?php

//CREAMOS LA CLASE CONEXION
class Conexion {
    public function get_conexion(){
        $user = "root";
        $pass = "";
        $host = "localhost";
        $dbname = "automarket";

        $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        return $conexion;
    }

    
}



?>