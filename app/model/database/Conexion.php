<?php

class Conexion
{
    private $HOST = "localhost";
    private $USER = "root";
    private $PASSWORD = "";
    private $DBNAME = "nueva";

    public function conexion() {

        try {

            $PDO = new PDO("mysql:host=".$this->HOST.";dbname=".$this->DBNAME, $this->USER, $this->PASSWORD);
            return $PDO;

        } catch(PDOException $e) {

            return $e->getMessage();

        }
    }

}


