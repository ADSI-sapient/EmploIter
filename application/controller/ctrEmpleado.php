<?php 
class ctrEmpleado extends Controller
{
private $mdlEmpleado;

	function __construct()
	{
		$this->mdlEmpleado = $this->loadModel("mdlEmpleado");
	}

	public function regEmpleado(){

		if (isset($_POST['btnRegistrarEmp'])) {

			$this->mdlEmpleado->__set("documento", $_POST['documento']);
			$this->mdlEmpleado->__set("id_cargo", $_POST['cargo']);
			$this->mdlEmpleado->__set("nombre", $_POST['nombre']);
			$this->mdlEmpleado->__set("apellido", $_POST['apellido']);
			$this->mdlEmpleado->__set("direccion", $_POST['direccion']);
			$this->mdlEmpleado->__set("telefono", $_POST['telefono']);
			$this->mdlEmpleado->__set("profesion", $_POST['profesion']);
			$this->mdlEmpleado->__set("salario", $_POST['salario']);
			$this->mdlEmpleado->regEmpleado();
		}

		$profesiones = $this->mdlEmpleado->consProfesion();
		$cargos = $this->mdlEmpleado->consCargos();

		require APP. 'view/_templates/header.php';
		require APP. 'view/empleado/registEmpleado.php';
		require APP. 'view/_templates/footer.php';
	}

	public function listarEmpleados(){
		$empleados = $this->mdlEmpleado->listarEmpleados();

		require APP. 'view/_templates/header.php';
		require APP. 'view/empleado/listarEmpleados.php';
		require APP. 'view/_templates/footer.php';
	}

	public function regProfesion(){
		$this->mdlEmpleado->__set("profesion", $_POST['txtProfesion']);
		$this->mdlEmpleado->regProfesion();	

		header("location: ".URL."ctrEmpleado/regEmpleado");
	}

	public function regCargo(){
		$this->mdlEmpleado->__set("cargo", $_POST['txtCargo']);
		$this->mdlEmpleado->__set("salario", $_POST['txtSalario']);
		$this->mdlEmpleado->regCargo();	

		header("location: ".URL."ctrEmpleado/regEmpleado");
	}
}
