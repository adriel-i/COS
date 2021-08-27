<?php


class MySQL {

	private $_conexion;

	public function __construct() {
		$this->_conexion = new mysqli("127.0.0.1", "root", "", "cos2");
	}
	//  PARA CONSULTAS
	public function consultar($sql) {
		$datos = $this->_conexion->query($sql);
		return $datos;
	}
	// PARA INSERSIONES
	public function insertar($sql) {
		$datos = $this->_conexion->query($sql);
		// DESPUES DE INSERTAR LOS DATOS DEVOLVEMOS EL ID GENERADO
		return $this->_conexion->insert_id;
	}

	public function actualizar($sql) {
		$this->_conexion->query($sql);
	}

	public function darBaja($sql) {
		$this->_conexion->query($sql);
	}

}



?>