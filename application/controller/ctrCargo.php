<?php
	class ctrCargo extends Controller{

		private $_modelCargo;
		private $__modelProceso;

		function __construct(){
			$this->_modelCargo = $this->loadModel("mdlCargo");
			$this->_modelProceso = $this->loadModel("mdlProceso");
		}

		public function registrarCargo(){

			if (isset($_POST["regCargo"])) {
				$this->_modelCargo->__SET("idRiesgo", $_POST['selectRiesgo']);
				$this->_modelCargo->__SET("cargo", $_POST['txtCargo']);
				$this->_modelCargo->__SET("salario", $_POST['txtSalario']);
				$this->_modelCargo->regCargo();

				$id_cargo = $this->_modelCargo->consUltimoCargo()["id_cargo"];

				$this->_modelCargo->__SET("id_cargo", $id_cargo);

				$proces = explode(',', $_POST['procesos'][0]);
				foreach ($proces as $value) {
					$this->_modelCargo->__SET("id_proceso", $value);
					$this->_modelCargo->regProcesoCargo();
				}
			}

			$procesos = $this->_modelProceso->listProcesos();
			$cargos = $this->_modelCargo->listCargos();

			include APP.'view/_templates/header.php';
			include APP.'view/Cargo/cargo.php';
			include APP.'view/_templates/footer.php';
		}

		public function consRiesgo(){
			$this->_modelCargo->__SET("idRiesgo", $_POST["idRiesgo"]);
			$riesgo = $this->_modelCargo->consRiesgo();
			echo json_encode($riesgo);
		}

		public function borrarCargo(){
			$this->_modelCargo->__SET("id_cargo", $_POST["id_cargo"]);
			echo json_encode($this->_modelCargo->borrarProcesoCargo());
		}
	}