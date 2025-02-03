<?php

require_once 'database/Conexion.php';


class Usuario {

    private $id;
    private $PDO;

    public $nombre;
    public $correo;
    public $nivel;
    public $password;
    public $telefono;
    public $passwordHash;

    //Getters y Setters
    public function setId($id) {

        $this->id = $id;

    }

    public function getId() {

        return $this->id;
    
    }

    //Metodos de la clase
    public function __construct() {
        $conn = new Conexion();
        $this->PDO = $conn->conexion();
    }

    public function crear() {

        $stmt = $this->PDO->prepare("INSERT INTO usuarios (nombre, telefono, correo, password, nivel) VALUES (:nombre, :telefono, :correo, :password, :nivel)");

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':password', $this->passwordHash);
        $stmt->bindParam(':nivel', $this->nivel);

        return $stmt->execute()? true : false;

    }

    public function eliminar() {

        $stmt = $this->PDO->prepare("DELETE FROM usuarios WHERE id_usuario = :id");

        $stmt->bindParam(':id', $this->id);
        

        return $stmt->execute()? true : false;

    }

    public function existeUsuario() {

        $query = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $this->PDO->prepare($query);
        $stmt->execute([':correo' => $this->correo]);
        
        return $stmt->rowCount() > 0? true : false;

    }

    public function existeTelefono() {

        $query = "SELECT * FROM usuarios WHERE telefono = :telefono";
        $stmt = $this->PDO->prepare($query);
        $stmt->execute([':telefono' => $this->telefono]);
        
        return $stmt->rowCount() > 0? true : false;

    }

    public function obtenerPasswordHash() {

        $query = "SELECT password FROM usuarios WHERE correo = :correo";
        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();

        $this->passwordHash = $stmt->fetchColumn();
    }

    public function obtenerDatos() {

        $query = "SELECT id_usuario, nombre, correo, telefono, nivel FROM usuarios WHERE correo = :correo";
        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function obtenerEmpleados() {

        $stmt = $this->PDO->prepare("SELECT id_usuario, nombre, correo, telefono, nivel FROM usuarios WHERE nivel = 'Administrador' OR nivel = 'Empleado' OR nivel='Secretaria de Compras' OR nivel='Secretaria de Ventas'");

        $stmt->execute();

        return $stmt->rowCount() > 0? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;

    }

    public function obtenerClientes() {

        $stmt = $this->PDO->prepare("SELECT id_usuario, nombre, correo, telefono, nivel FROM usuarios WHERE nivel = 'Cliente'");

        $stmt->execute();

        return $stmt->rowCount() > 0? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;

    }

    public function esNivelValido() : bool {
        $niveles = ['Administrador', 'Empleado', 'Cliente', 'Tecnico', 'Secretaria de Compras', 'Secretaria de Ventas'];
        
        foreach ($niveles as $nivel) {
            if ($this->nivel == $nivel) {
                return true;
            }
        }
        return false;
    }

    public function obtenerTecnicos() {

        $stmt = $this->PDO->prepare("SELECT id_usuario, nombre, correo, telefono, nivel FROM usuarios WHERE nivel = 'Tecnico'");

        $stmt->execute();

        return $stmt->rowCount() > 0? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;

    }

    public function obtenerUsuarioById() {

        $stmt = $this->PDO->prepare("SELECT id_usuario, nombre, correo, telefono, nivel FROM usuarios WHERE id_usuario = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;

    }

    public function editar() : bool {

        $stmt = $this->PDO->prepare("UPDATE usuarios SET nombre = :nombre, correo = :correo, telefono = :telefono, nivel = :nivel WHERE id_usuario = :id ");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':nivel', $this->nivel);
        $stmt->bindParam(':id', $this->id);
        
        return $stmt->execute()? true : false;

    }

    public function obtenerCorreo() {

        $stmt = $this->PDO->prepare("SELECT correo FROM usuarios HWERE id_usuario = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;


    }

}


?>