<?php
    class conexion{
        static public function conectar(){
            try {
                $db = new PDO("mysql:host=localhost; dbname=parqueadero; charset=utf8", "root", "");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }
?>