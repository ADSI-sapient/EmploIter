<?php

class mdlEmpleado
{
    private $db;
    private $id_cargo;
    private $id_profesion;
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $direccion;

    private $profesion;

    private $cedEmp;
    
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function __SET($atributo, $valor){
        $this->$atributo = $valor;
    }    


    public function __GET($atributo){
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
        $query->execute();
        return $query;
    }

    public function modificarEmpleado(){
        $sql = "CALL SP_ModEmpleado(?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->documento);
        $query->bindParam(2, $this->id_cargo);
        $query->bindParam(3, $this->id_profesion);
        $query->bindParam(4, $this->nombre);
        $query->bindParam(5, $this->apellido);
        $query->bindParam(6, $this->direccion);
        $query->bindParam(7, $this->telefono);
        return $query->execute();
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

    public function consProfesion(){
         $sql = "CALL SP_ConsProfesion()";
         $query = $this->db->prepare($sql);
         $query->execute();
         return $query->fetchAll();
    }

    public function borrarProfesion(){
        $sql = "CALL SP_DeleteProf(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id_profesion);
        return $query->execute();
    }

    public function modificarProfesion(){
        $sql = "CALL SP_ActualizarProfesion(?, ?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id_profesion);
        $query->bindParam(2, $this->profesion);
        return $query->execute();
    }

    public function consEmpleado(){
        $sql = "CALL SP_ConsEmpleado(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->cedEmp);
        $query->execute();
        return $query->fetch();
    }

    public function borrarEmpleado(){
        $sql = "CALL SP_BorrarEmpleado(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->documento);
        return $query->execute();
    }
}
