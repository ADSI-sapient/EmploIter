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

			$this->mdlEmpleado->__SET("documento", $_POST['documento']);
			$this->mdlEmpleado->__SET("id_cargo", $_POST['cargo']);
			$this->mdlEmpleado->__SET("nombre", $_POST['nombre']);
			$this->mdlEmpleado->__SET("apellido", $_POST['apellido']);
			$this->mdlEmpleado->__SET("direccion", $_POST['direccion']);
			$this->mdlEmpleado->__SET("telefono", $_POST['telefono']);
			$this->mdlEmpleado->__SET("profesion", $_POST['profesion']);
			$this->mdlEmpleado->__SET("salario", $_POST['salario']);
			$this->mdlEmpleado->regEmpleado();
		}

		$profesiones = $this->mdlEmpleado->consProfesion();
		$cargos = $this->mdlEmpleado->consCargos();

		require APP. 'view/_templates/header.php';
		require APP. 'view/empleado/registEmpleado.php';
		require APP. 'view/_templates/footer.php';
	}

	public function listProfesiones(){
		$profesiones = $this->mdlEmpleado->consProfesion();
		echo json_encode($profesiones);
	}

	public function listarEmpleados(){
		$empleados = $this->mdlEmpleado->listarEmpleados();

		require APP. 'view/_templates/header.php';
		require APP. 'view/empleado/listarEmpleados.php';
		require APP. 'view/_templates/footer.php';
	}

	public function regProfesion(){
		$this->mdlEmpleado->__SET("profesion", $_POST['txtProfesion']);
		echo json_encode($this->mdlEmpleado->regProfesion());	
	}

	public function regCargo(){
		$this->mdlEmpleado->__SET("cargo", $_POST['txtCargo']);
		$this->mdlEmpleado->__SET("salario", $_POST['txtSalario']);
		$this->mdlEmpleado->regCargo();	

		header("location: ".URL."ctrEmpleado/regEmpleado");
	}

	public function borrarProfesion(){
		$this->mdlEmpleado->__SET("id_profesion", $_POST["idProf"]);
		$this->mdlEmpleado->borrarProfesion();
	}

	public function modificarProfesion(){
		$this->mdlEmpleado->__SET("id_profesion", $_POST["idProf"]);
		$this->mdlEmpleado->__SET("profesion", $_POST["nomProf"]);
		echo json_encode($this->mdlEmpleado->modificarProfesion());
	}
}
