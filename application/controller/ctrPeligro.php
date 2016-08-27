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
			include APP.'view/_templates/header.php';
			include APP.'view/peligro/regPeligro.php';
			include APP.'view/_templates/footer.php';
		}
	}