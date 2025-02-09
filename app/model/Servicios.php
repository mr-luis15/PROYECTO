<?php

require_once 'database/Conexion.php';


class Servicios {

    private $id;
    private $cliente;
    private $tecnico;
    private $descripcion;
    private $fecha;
    private $estado;
    private $PDO;

    public function __construct()
    {
        $conn = new Conexion();
        $this->PDO = $conn->conexion();
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setTecnico($tecnico) {
        $this->tecnico = $tecnico;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }



    public function crear() {

        $query = "INSERT INTO servicios (cliente, tencico, descripcion, estado, fecha) VALUES (:cliente, :tecnico:, :descripcion, :estado, :fecha))";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':tecnico', $this->tecnico);
        $stmt->bindParam(':descripion', $this->descripcion);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':fecha', $this->fecha);

        return $stmt->execute() ? true : false;
    }


    public function eliminar() {

        $query = "DELETE FROM servicios WHERE id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);

    }

    
}


?>