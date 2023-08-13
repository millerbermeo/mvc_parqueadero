<?php
    require_once "controller/parqueadero.php";
require_once "config/conexion.php";

    $controlador = new parqueadero();

    if (!isset($_REQUEST['c'])){
        $controlador->index();
    }else {
        $action= $_REQUEST['c'];
        call_user_func(array($controlador, $action));
    }

?>