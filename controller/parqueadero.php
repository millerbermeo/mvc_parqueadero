<?php
require_once "model/Model.php";

class parqueadero
{


    public $Model;


    public function __construct()
    {
        $this->Model = new Model();
    }

    public function index()
    {
        require_once "views/dashboard.php";
    }

    public function nuevo()
    {
        $alm = new model();
        /* if (isset($_REQUEST['id'])){
             $alm = $this->Model->cargarID($_REQUEST['id']);
         }*/

        require_once "views/form.php";
    }

    public function salida()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dato = $this->Model->cargarId($id);
            require_once "views/salida.php";
        } else {
            // Manejar el caso en que "id" no está definido en la URL
        }
    }


    public function eliminar()
    {
        $this->Model->delete($_REQUEST['id']);
        header("Location: index.php");
    }

    public function guardar()
    {
        $alm = new Model();
        $alm->nombre_user = $_POST['nombre_user'];
        $alm->documento = $_POST['documento'];
        $alm->email = $_POST['email'];
        $alm->password = $_POST['password'];


        $alm2 = new Model();
        $alm2->placa = $_POST['placa'];
        $alm2->marca = $_POST['marca'];
        $alm2->modelo = $_POST['modelo'];
        $alm2->color = $_POST['color'];

        $this->Model->registrarUsuario($alm);
        $this->Model->registrarvehiculo($alm2);

        header("Location: index.php");
    }

    public function guardarIngreso()
    {
        $alm = new Model();
        $alm->id_estacionamiento = $_POST['id_estacionamiento'];
        $fecha_salida_str = $_POST['fecha_salida'];
        $fecha_entrada_str = $_POST['fecha_entrada'];
        $fecha_salida2 = new DateTime($fecha_salida_str);
        $fecha_entrada = new DateTime($fecha_entrada_str);
        $alm->fecha_salida = $fecha_salida_str;
        $alm->user = $_POST['user'];
        $alm->vehiculo = $_POST['vehiculo'];
        $alm->piso = $_POST['piso'];

        $diferencia = $fecha_entrada->diff($fecha_salida2);
        $horas = $diferencia->h;

        $alm->tarifa = $horas * 1000;


        $alm->id_estacionamiento > 0 ? $this->Model->actualizarEstacionamiento($alm) : $this->Model->registrarIngreso($alm);

        header("Location: index.php");
    }


}