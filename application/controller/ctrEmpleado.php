<?php 

session_start();
use Dompdf\Dompdf;
class ctrEmpleado extends Controller
{
	private $mdlEmpleado;

	function __construct()
	{
		$this->mdlEmpleado = $this->loadModel("mdlEmpleado");
		$this->_modelCargo = $this->loadModel("mdlCargo");
	}

	public function regEmpleado(){

		if (isset($_POST['btnRegistrarEmp'])) {

			$this->mdlEmpleado->__SET("documento", $_POST['documento']);
			$this->mdlEmpleado->__SET("id_cargo", $_POST['cargo']);
			$this->mdlEmpleado->__SET("nombre", $_POST['nombre']);
			$this->mdlEmpleado->__SET("apellido", $_POST['apellido']);
			$this->mdlEmpleado->__SET("direccion", $_POST['direccion']);
			$this->mdlEmpleado->__SET("telefono", $_POST['telefono']);
			$this->mdlEmpleado->__SET("id_profesion", $_POST['profesion']);
			$this->mdlEmpleado->regEmpleado();
		}

		$profesiones = $this->mdlEmpleado->consProfesion();
		$cargos = $this->_modelCargo->consCargos();

		require APP. 'view/_templates/header.php';
		require APP. 'view/empleado/registEmpleado.php';
		require APP. 'view/_templates/footer.php';
	}

	public function modificarEmpleado(){
			$this->mdlEmpleado->__SET("documento", $_POST['documento']);
			$this->mdlEmpleado->__SET("id_cargo", $_POST['cargo']);
			$this->mdlEmpleado->__SET("nombre", $_POST['nombre']);
			$this->mdlEmpleado->__SET("apellido", $_POST['apellido']);
			$this->mdlEmpleado->__SET("direccion", $_POST['direccion']);
			$this->mdlEmpleado->__SET("telefono", $_POST['telefono']);
			$this->mdlEmpleado->__SET("id_profesion", $_POST['profesion']);
			$this->mdlEmpleado->modificarEmpleado();

			header("location: ".URL."ctrEmpleado/listarEmpleados");
	}

	public function listProfesiones(){
		$profesiones = $this->mdlEmpleado->consProfesion();
		echo json_encode($profesiones);
	}

	public function listarEmpleados(){
		// require APP.'view/empleado/tablesEmpleado.php';
		$empleados = $this->mdlEmpleado->listarEmpleados();
		$profesiones = $this->mdlEmpleado->consProfesion();
		$cargos = $this->_modelCargo->consCargos();



		require APP. 'view/_templates/header.php';
		require APP. 'view/empleado/listarEmpleados.php';
		require APP. 'view/_templates/footer.php';
	}

	public function regProfesion(){
		$this->mdlEmpleado->__SET("profesion", $_POST['txtProfesion']);
		echo json_encode($this->mdlEmpleado->regProfesion());	
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

	public function generarFactura(){
		if (isset($_POST["contenido"])) {
			$_SESSION["ht"] = $_POST["contenido"];
		}

		$dompdf = new Dompdf();
		$dompdf->loadHtml($_SESSION["ht"]);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream();
	}

	public function borrarEmpleado(){
		$this->mdlEmpleado->__SET("documento", $_POST["documento"]);
		$this->mdlEmpleado->borrarEmpleado();
	}
}
