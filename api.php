<?php
class Api{
    public function getAreas(){
        $vector = array();
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "SELECT name, ST_AsGeoJSON(polygon) FROM areas";
        $consulta = $db->prepare($sql);
        $consulta->execute();

        while ($fila = $consulta->fetch()) {
            $vector[] = array(
                "nombre" => $fila['name'],
                "area" => $fila['st_asgeojson']
            );
        }

        return $vector;
    }
    public function addArea($nombre, $figura){
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "INSERT INTO areas (name, polygon) VALUES ('$nombre', ST_GeometryFromText('POLYGON(($figura))'));";
        //$query = "INSERT INTO areas (name, polygon) VALUES ('$nombre', ST_GeometryFromText('POLYGON(($figura))'));";
        $consulta = $db->prepare($sql);
        //$consulta->bindParam(':nombre', $nombre);
        //$consulta->bindParam(':figura', $figura);
        $consulta->execute();


        return '{"msg":"area agregada"}';
    }
}


?>