<?php

require_once 'database/Conexion.php';


class Servicios
{

    private $id;
    private $cliente;
    private $tecnico;
    private $descripcion;
    private $direccion;
    private $fecha;
    private $estado;
    private $PDO;

    public function __construct()
    {
        $conn = new Conexion();
        $this->PDO = $conn->conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }



    public function crear()
    {

        $query = "INSERT INTO servicios (id_cliente, id_tecnico, descripcion, direccion, estado, fecha_servicio) VALUES (:cliente, :tecnico, :descripcion, :direccion, :estado, :fecha)";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':tecnico', $this->tecnico);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':fecha', $this->fecha);

        return $stmt->execute() ? true : false;
    }


    public function obtenerServiciosNoRealizados()
    {
        $query = "SELECT * FROM servicios WHERE estado = 'No realizado'";

        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }


    public function obtenerServiciosRealizados()
    {
        $query = "SELECT * FROM servicios WHERE estado = 'Realizado'";

        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }



    public function setRealizado() {
        
        $query = "UPDATE servicios SET estado = 'Realizado' WHERE id_servicio = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ? true : false;
    }

    public function eliminar() {
        
        $query = "DELETE FROM servicios WHERE id_servicio = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ? true : false;
    }
}
