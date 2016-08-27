<?php
	class mdlCargo {
		private $_db;

		private $id_cargo;
		private $id_proceso;

		private $cargo;
    	private $salario;

		function __construct($db)
		{
			$this->_db = $db;
		}

		function __GET($atributo){
			return $this->$atributo;
		}

		function __SET($atributo, $valor){
			$this->$atributo = $valor;
		}

		public function regCargo(){
	        $sql = "CALL SP_RegistrarCargo(?, ?)";
	        $query = $this->_db->prepare($sql);
	        $query->bindParam(1, $this->cargo);
	        $query->bindParam(2, $this->salario);
        	return $query->execute();
    	}

    	public function consCargos(){
	         $sql = "CALL SP_ConsCargos()";
	         $query = $this->_db->prepare($sql);
	         $query->execute();
         	 return $query->fetchAll();
    	}

    	public function consUltimoCargo(){
    		$sql = "CALL SP_UltCargo()";
	        $query = $this->_db->prepare($sql);
	        $query->execute();
         	return $query->fetch();
    	}

    	public function regProcesoCargo(){
    		$sql = "CALL SP_RegCargoProces(?, ?)";
	        $query = $this->_db->prepare($sql);
	        $query->bindParam(1, $this->id_cargo);
	        $query->bindParam(2, $this->id_proceso);
        	return $query->execute();
    	}
	}