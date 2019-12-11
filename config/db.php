<?php

//configuracion y conexion a base de datos
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'tienda_master');
        $db->query("SET NAMES 'utf-8");
        return $db;
    }
}