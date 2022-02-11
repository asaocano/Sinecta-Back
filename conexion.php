<?php

class Conexion {

    public function getConexion(){
    $host = "localhost";
    $db = "locations";
    $user = "postgres";
    $password = "admin";
    $port = '5432';

    $db = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;

}

}

?>