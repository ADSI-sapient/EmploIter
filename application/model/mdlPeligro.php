<?php
	class mdlPeligro
	{
		private $_db;

		private $ctrIngenieria;
		private $descrIntervencion;

		private $peorConsec;
		private $ReqLegalAsoc;
		private $idMedInt;

		private $fuente;
		private $medio;
		private $individuo;
		private $idCritControl;

		private $ND;
		private $NE;
		private $NP;
		private $Interp;
		private $NC;
		private $NR;
		private $Nivel;
		private $valRiesgo;

		private $idRiesgo;
		private $idControl;
		private $clasificacionPel;
		private $descPel;
		private $efectosPel;

		private $id_proceso;

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

		function listarPeligros(){
			$sql = "CALL SP_ListPeligros";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}

		function regiMedidasIntervencion(){
			$sql = "CALL SP_RegMedInt(?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->ctrIngenieria);
			$query->bindParam(2, $this->descrIntervencion);
			$query->execute();

			$sql = "CALL SP_UltMedInt";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetch();
		}

		function regCriterioControl(){
			$sql = "CALL SP_RegCritCont(?, ?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->peorConsec);
			$query->bindParam(2, $this->ReqLegalAsoc);
			$query->bindParam(3, $this->idMedInt);
			$query->execute();

			$sql = "CALL SP_UltCritCont";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetch();
		}

		function regControl(){
			$sql = "CALL SP_RegCont(?, ?, ?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->fuente);
			$query->bindParam(2, $this->medio);
			$query->bindParam(3, $this->individuo);
			$query->bindParam(4, $this->idCritControl);
			$query->execute();

			$sql = "CALL SP_UltCont";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetch();
		}

		function regiRiesgo(){
			$sql = "CALL SP_RegRiesgo(?, ?, ?, ?, ?, ?, ?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->ND);
			$query->bindParam(2, $this->NE);
			$query->bindParam(3, $this->NP);
			$query->bindParam(4, $this->Interp);
			$query->bindParam(5, $this->NC);
			$query->bindParam(6, $this->NR);
			$query->bindParam(7, $this->Nivel);
			$query->bindParam(8, $this->valRiesgo);
			$query->execute();

			$sql = "CALL SP_UltRiesgo";
			$query = $this->_db->prepare($sql);
			$query->execute();
			return $query->fetch();
		}

		function regiPeligro(){
			$sql = "CALL SP_RegPeligro(?, ?, ?, ?, ?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->idRiesgo);
			$query->bindParam(2, $this->idControl);
			$query->bindParam(3, $this->clasificacionPel);
			$query->bindParam(4, $this->descPel);
			$query->bindParam(5, $this->efectosPel);
			return $query->execute();
		}

		public function consPeligros()
		{
			$sql = "CALL SP_ConsPeligros(?)";
			$query = $this->_db->prepare($sql);
			$query->bindParam(1, $this->id_proceso);
			$query->execute();
			return $query->fetchAll();
		}
	}