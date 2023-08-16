<?php

require_once "config/conexion.php";

class Model
{

    public $CNX;
    public $nombre_user;
    public $documento;
    public $email;
    public $password;


    public $placa;
    public $marca;
    public $modelo;
    public $color;

    public $user;
    public $vehiculo;
    public $piso;
    public $tarifa;
    public $fecha_entrada;

    public $id_estacionamiento;
    public $fecha_salida;

    public function __construct()
    {
        try {
            $this->CNX = conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }


    public function listar()
    {
        try {
                $query = "SELECT r.id_estacionamiento, p.nombre_user, v.placa, u.piso, r.fecha_entrada, r.fecha_salida, r.tarifa FROM registroestacionamiento r inner join vehiculos v on r.vehiculo_id = v.id_vehiculo inner join ubicacion u on r.ubicacion_id = u.id_ubicacion inner join usuarios p on r.usuario_id = p.id_user";
            $smt = $this->CNX->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarRegistros($tabla)
    {
        try {
            $query = "SELECT * from $tabla";
            $smt = $this->CNX->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function registrarUsuario(Model $data)
    {
        $query = "INSERT INTO usuarios (nombre_user, documento, email, password) values (?,?,?,?)";
        $this->CNX->prepare($query)->execute(array($data->nombre_user, $data->documento, $data->email, $data->password));
    }

    public function registrarvehiculo(Model $data)
    {
        $query = "INSERT INTO vehiculos (placa, marca, modelo, color) values (?,?,?,?)";
        $this->CNX->prepare($query)->execute(array($data->placa, $data->marca, $data->modelo, $data->color));
    }

    public function registrarIngreso(Model $data)
    {
        $query = "INSERT INTO registroestacionamiento (usuario_id, vehiculo_id, ubicacion_id) values (?,?,?)";
        $this->CNX->prepare($query)->execute(array($data->user, $data->vehiculo, $data->piso));
    }


    public function actualizarEstacionamiento(Model $data){
        $query = "UPDATE registroestacionamiento set fecha_Salida=?, tarifa=? where id_estacionamiento=?";
        $smt= $this->CNX->prepare($query);
        $smt->execute([$data->fecha_salida, $data->tarifa, $data->id_estacionamiento]);
    }

    public function delete($id){
        try {
            $query = "DELETE from registroestacionamiento where id_estacionamiento=?";
            $smt = $this->CNX->prepare($query);
            $smt->execute(array($id));
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function cargarId($id) {
        try {
            $query = "SELECT * FROM registroestacionamiento WHERE id_estacionamiento=?";
            $smt = $this->CNX->prepare($query);
            $smt->execute(array($id));

            // Obtener y devolver los resultados como un objeto o arreglo
            $result = $smt->fetch(PDO::FETCH_OBJ); // Puedes usar PDO::FETCH_ASSOC para un arreglo asociativo

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarPersonalizado($matricula) {
        try {
            $query = "SELECT r.id_estacionamiento, p.nombre_user, v.placa, u.piso, r.fecha_entrada, r.fecha_salida, r.tarifa
                  FROM registroestacionamiento r
                  INNER JOIN vehiculos v ON r.vehiculo_id = v.id_vehiculo
                  INNER JOIN ubicacion u ON r.ubicacion_id = u.id_ubicacion
                  INNER JOIN usuarios p ON r.usuario_id = p.id_user
                  WHERE v.placa = ?";

            $smt = $this->CNX->prepare($query);
            $smt->execute(array($matricula));

            // Obtener y devolver el resultado como un objeto
            $result = $smt->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



}