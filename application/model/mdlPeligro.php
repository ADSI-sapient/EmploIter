<?php
	class mdlPeligro
	{
		private $_db;

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
	}