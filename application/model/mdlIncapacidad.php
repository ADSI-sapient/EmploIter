<?php
	/**
	* 
	*/
	class mdlIncapacidad
	{
		private $_db;

		private $idEmpleado;
		private $idEnfermedad;
		private $idAccidente;
		private $razonInc;
		private $fechaInicio;
		private $fechaFin;
		private $diasInc;
		private $valInc;
		private $descripcion;
		
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

		public function consEnfermedad(){
			$sql = "CALL SP_ConsEnfermedad(?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->idEnfermedad);
			$query->execute();
			return $query->fetch();
		}

		public function consAccidente(){
			$sql = "CALL SP_ConsAccidente(?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->idAccidente);
			$query->execute();
			return $query->fetch();
		}

		public function regIncapacidad(){
			$sql = "CALL SP_RegIncapacidad(?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->idEmpleado);
			$query->bindParam(2, $this->idEnfermedad);
			$query->bindParam(3, $this->idAccidente);
			$query->bindParam(4, $this->razonInc);
			$query->bindParam(5, $this->fechaInicio);
			$query->bindParam(6, $this->fechaFin);
			$query->bindParam(7, $this->diasInc);
			$query->bindParam(8, $this->valInc);
			$query->bindParam(9, $this->descripcion);
			return $query->execute();
		}

		public function listarAccidentes(){
			$sql = "CALL SP_ListAccidente()";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}

		public function consIncapacidades(){
			$sql = "CALL SP_ConsIncapacidades(?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->idEmpleado);
			$query->execute();
			return $query->fetchAll();
		}

		public function listarIncapacidades(){
			$sql = "CALL SP_ListarIncapacidades()";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
	}