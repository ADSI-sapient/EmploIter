<?php
	class mdlProceso 
	{
		private $_db;
		private $id_zona;
		private $zona;
		private $nombre;
		private $tareas;

		private $id_proceso;
		private $id_peligro;


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

		public function listProcesos(){
			$sql = "CALL SP_ListProcesos";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}

		public function listZona(){
			$sql = "CALL SP_ListZona";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}

		public function borrarZona(){
			$sql = "CALL SP_BorrarZona(?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->id_zona);
			return $query->execute();
		}

		public function actualizarZona(){
			$sql = "CALL SP_ModificarZona(?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->id_zona);
			$query->bindParam(2, $this->zona);
			return $query->execute();
		}

		public function regZona(){
			$sql = "CALL SP_RegZona(?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->zona);
			return $query->execute();
		}

		public function regProceso(){
			$sql = "CALL SP_RegProceso(?, ?, ?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->id_zona);
			$query->bindParam(2, $this->nombre);
			$query->bindParam(3, $this->tareas);
			$query->bindParam(4, $this->rutina);
			return $query->execute();
		}

		public function ultimoProces(){
			$sql = "CALL SP_UltProc()";
	        $query = $this->_db->prepare($sql);
	        $query->execute();
         	return $query->fetch();
		}

		public function regProcesoPeligro(){
			$sql = "CALL SP_RegProcesoPeligro(?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->id_proceso);
			$query->bindParam(2, $this->id_peligro);
			return $query->execute();
		}
	}