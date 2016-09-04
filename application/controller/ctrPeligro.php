<?php
	/**
	*  
	*/
	class ctrPeligro extends Controller
	{
		private $_modelPeligro;

		function __construct()
		{
			$this->_modelPeligro = $this->loadModel("mdlPeligro");
		}

		public function regPeligro(){
			if (isset($_POST["btnRegistrar"])) {
				$this->_modelPeligro->__SET("ND", $_POST["ND"]);
				$this->_modelPeligro->__SET("NE", $_POST["NE"]);
				$this->_modelPeligro->__SET("NP", $_POST["NP"]);
				$this->_modelPeligro->__SET("Interp", $_POST["Interp"]);
				$this->_modelPeligro->__SET("NC", $_POST["NC"]);
				$this->_modelPeligro->__SET("NR", $_POST["NR"]);
				$this->_modelPeligro->__SET("Nivel", $_POST["Nivel"]);
				$this->_modelPeligro->__SET("valRiesgo", $_POST["valRiesgo"]);
				$idRiesgo = $this->_modelPeligro->regiRiesgo()["idRiesgo"];

				$this->_modelPeligro->__SET("ctrIngenieria", $_POST["ctrIng"]);
				$this->_modelPeligro->__SET("descrIntervencion", $_POST["desInter"]);
				$idMedInt = $this->_modelPeligro->regiMedidasIntervencion()["idMedInt"];

				$this->_modelPeligro->__SET("peorConsec", $_POST["peorConsec"]);
				$this->_modelPeligro->__SET("ReqLegalAsoc", $_POST["ReqLegalAsoc"]);
				$this->_modelPeligro->__SET("idMedInt", $idMedInt);
				$idCritControl = $this->_modelPeligro->regCriterioControl()["idCriCon"];

				$this->_modelPeligro->__SET("fuente", $_POST["fuente"]);
				$this->_modelPeligro->__SET("medio", $_POST["medio"]);
				$this->_modelPeligro->__SET("individuo", $_POST["individuo"]);
				$this->_modelPeligro->__SET("idCritControl", $idCritControl);
				$idControl = $this->_modelPeligro->regControl()["idControl"];


				$this->_modelPeligro->__SET("idRiesgo", $idRiesgo);
				$this->_modelPeligro->__SET("idControl", $idControl);
				$this->_modelPeligro->__SET("clasificacionPel", $_POST["clasificacionPel"]);
				$this->_modelPeligro->__SET("descPel", $_POST["descPel"]);
				$this->_modelPeligro->__SET("efectosPel", $_POST["efectosPel"]);
				$this->_modelPeligro->regiPeligro();
			}


			include APP.'view/_templates/header.php';
			include APP.'view/peligro/regPeligro.php';
			include APP.'view/_templates/footer.php';
		}

		public function listarPeligros(){
			$peligros = $this->_modelPeligro->listarPeligros();

			include APP.'view/_templates/header.php';
			include APP.'view/peligro/listarPeligros.php';
			include APP.'view/_templates/footer.php';
		}

		public function borrarPeligro(){
			$this->_modelPeligro->__SET("idPeligro", $_POST["idPeligro"]);
			echo json_encode($this->_modelPeligro->borrarPeligro());
		}
	}