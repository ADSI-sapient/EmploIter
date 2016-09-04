<?php

	class ctrProceso extends Controller
	{
		private $_modelProceso;
		function __construct()
		{
			$this->_modelProceso = $this->loadModel("mdlProceso");
			$this->_modelPeligro = $this->loadModel("mdlPeligro");
		}


		public function registrarProceso(){
			if (isset($_POST["regProc"])) {
				$this->_modelProceso->__SET("nombre", $_POST["nomProces"]);
				$this->_modelProceso->__SET("id_zona", $_POST["zona"]);
				$this->_modelProceso->__SET("rutina", $_POST["rutina"]);
				$this->_modelProceso->__SET("tareas", $_POST["txtArea"]);

				$this->_modelProceso->regProceso();

				$id_proceso = $this->_modelProceso->ultimoProces()["id_proceso"];
				$this->_modelProceso->__SET("id_proceso", $id_proceso);

				$peligro = explode(',', $_POST['peligros'][0]);
				foreach ($peligro as $value) {
					$this->_modelProceso->__SET("id_peligro", $value);
					$this->_modelProceso->regProcesoPeligro();
				}
			}

			$peligros = $this->_modelPeligro->listarPeligros();
			$procesos = $this->_modelProceso->listProcesos();

			include APP.'view/_templates/header.php';
			include APP.'view/procesos/proceso.php';
			include APP.'view/_templates/footer.php';
		}

		public function listZona(){
			echo json_encode($this->_modelProceso->listZona());
		}

		public function borrarZona(){
			$this->_modelProceso->__SET("id_zona", $_POST["idZona"]);
			echo json_encode($this->_modelProceso->borrarZona());
		}

		public function modificarZona(){
			$this->_modelProceso->__SET("id_zona", $_POST["idZona"]);
			$this->_modelProceso->__SET("zona", $_POST["nomZona"]);
			echo json_encode($this->_modelProceso->actualizarZona());
		}

		public function regZona(){
			$this->_modelProceso->__SET("zona", $_POST["nomZona"]);
			echo json_encode($this->_modelProceso->regZona());
		}

		public function consProcesos()
		{
			$this->_modelProceso->__SET("id_cargo", $_POST["idcargo"]);
			echo json_encode($this->_modelProceso->listarProcesosConsEm());
		}

		public function borrarProceso(){
			$this->_modelProceso->__SET("id_proceso", $_POST["id_proceso"]);
			$this->_modelProceso->borrarProcesoPeligro();
			echo json_encode($this->_modelProceso->borrarProceso());
		}
	}