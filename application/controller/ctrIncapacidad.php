<?php 

	/**
	* 
	*/
	class ctrIncapacidad extends Controller
	{
		private $_mdlIncapacidad;
		private $_mdlEmpleado;

		function __construct()
		{
			$this->_mdlIncapacidad = $this->loadModel("mdlIncapacidad");
			$this->_mdlEmpleado = $this->loadModel("mdlEmpleado");
		}

		public function regIncapacidad(){
			$this->_mdlIncapacidad->__SET("idEmpleado", $_POST["incEmpl"]);
			if (isset($_POST["enfermedad"])) {
				$this->_mdlIncapacidad->__SET("idEnfermedad", $_POST["enfermedad"]);
			} else {
				$this->_mdlIncapacidad->__SET("idEnfermedad", null);
			}
			if (isset($_POST["accidente"])) {
				$this->_mdlIncapacidad->__SET("idAccidente", $_POST["accidente"]);
			} else {
				$this->_mdlIncapacidad->__SET("idAccidente", null);
			}
			$this->_mdlIncapacidad->__SET("razonInc", $_POST["razonInc"]);
			$this->_mdlIncapacidad->__SET("fechaInicio", $_POST["fechaInicio"]);
			if (isset($_POST["fechaFin"])) {
				$this->_mdlIncapacidad->__SET("fechaFin", $_POST["fechaFin"]);
			} else{
				$this->_mdlIncapacidad->__SET("fechaFin", null);
			}
			$this->_mdlIncapacidad->__SET("diasInc", $_POST["diasInc"]);
			$this->_mdlIncapacidad->__SET("valInc", $_POST["valInc"]);
			$this->_mdlIncapacidad->__SET("descripcion", $_POST["descripcion"]);

			$this->_mdlIncapacidad->regIncapacidad();

			header('location: '.URL.'ctrIncapacidad/incapacidad');
		}

		public function editIncapacidad(){
			$this->_mdlIncapacidad->__SET("idEmpleado", $_POST["incEmpl"]);
			if (isset($_POST["enfermedad"])) {
				$this->_mdlIncapacidad->__SET("idEnfermedad", $_POST["enfermedad"]);
			} else {
				$this->_mdlIncapacidad->__SET("idEnfermedad", null);
			}
			if (isset($_POST["accidente"])) {
				$this->_mdlIncapacidad->__SET("idAccidente", $_POST["accidente"]);
			} else {
				$this->_mdlIncapacidad->__SET("idAccidente", null);
			}
			$this->_mdlIncapacidad->__SET("razonInc", $_POST["razonInc"]);
			$this->_mdlIncapacidad->__SET("fechaInicio", $_POST["fechaInicio"]);
			if (isset($_POST["fechaFin"])) {
				$this->_mdlIncapacidad->__SET("fechaFin", $_POST["fechaFin"]);
			} else{
				$this->_mdlIncapacidad->__SET("fechaFin", null);
			}
			$this->_mdlIncapacidad->__SET("diasInc", $_POST["diasInc"]);
			$this->_mdlIncapacidad->__SET("valInc", $_POST["valInc"]);
			$this->_mdlIncapacidad->__SET("descripcion", $_POST["descripcion"]);
			
			$this->_mdlIncapacidad->__SET("idIncapacidad", $_POST["idIncapacidad"]);

			$this->_mdlIncapacidad->editIncapacidad();

			header('location: '.URL.'ctrIncapacidad/incapacidad');
		}

		public function incapacidad(){
			$empleados = $this->_mdlEmpleado->listarEmpleados();
			$accidentes = $this->_mdlIncapacidad->listarAccidentes();
			$incapacidades = $this->_mdlIncapacidad->listarIncapacidades();

			require APP . 'view/_templates/header.php';
			require APP . 'view/incapacidad/incapacidad.php';
			require APP . 'view/_templates/footer.php';
		}

		public function consEnfermedad(){
			$this->_mdlIncapacidad->__SET("idEnfermedad", $_POST["idEnfermedad"]);
			$enfermedad = $this->_mdlIncapacidad->consEnfermedad();
			echo json_encode($enfermedad);
		}

		public function consEmpleado(){
			$this->_mdlEmpleado->__SET("cedEmp", $_POST["cedEmp"]);
			echo json_encode($this->_mdlEmpleado->consEmpleado());
		}

		public function consAccidente(){
			$this->_mdlIncapacidad->__SET("idAccidente", $_POST["idAccidente"]);
			echo json_encode($this->_mdlIncapacidad->consAccidente());
		}


		public function consIncapacidades(){
			$this->_mdlIncapacidad->__SET("idEmpleado", $_POST["cedula"]);
			echo json_encode($this->_mdlIncapacidad->consIncapacidades());
		}
	}