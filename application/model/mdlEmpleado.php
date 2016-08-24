<?php

class mdlEmpleado
{
    private $id_cargo;
    private $id_profesion;
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $direccion;

    private $profesion;
    private $cargo;
    private $salario;
    
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }    


    public function __get($atributo){
        return $this->$atributo;
    }

    public function regEmpleado()
    {
        $sql = "INSERT INTO tbl_empleados VALUES (?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->documento);
        $query->bindParam(2, $this->id_cargo);
        $query->bindParam(3, $this->id_profesion);
        $query->bindParam(4, $this->nombre);
        $query->bindParam(5, $this->apellido);
        $query->bindParam(6, $this->direccion);
        $query->bindParam(7, $this->telefono);
        // $query->bindParam(8, $this->salario);
        $query->execute();
        return $query;
    }

    public function listarEmpleados(){

        $sql = "CALL SP_ListarEmpleados()";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function regProfesion(){
        $sql = "CALL SP_RegistrarProfesion(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->profesion);
        return $query->execute();
    }

    public function regCargo(){
        $sql = "CALL SP_RegistrarCargo(?, ?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->cargo);
        $query->bindParam(2, $this->salario);
        return $query->execute();
    }

    public function consProfesion(){
         $sql = "CALL SP_ConsProfesion()";
         $query = $this->db->prepare($sql);
         $query->execute();
         return $query->fetchAll();
    }

    public function consCargos(){
         $sql = "CALL SP_ConsCargos()";
         $query = $this->db->prepare($sql);
         $query->execute();
         return $query->fetchAll();
    }
}
