<?php

require_once "MySQL.php";

class Contacto {

	private $_descripcion;
	private $_valor;
	private $_idPersona;
	private $_idTipoContacto;
	private $_idPersonaTipoContacto;
	
	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function getValor() {
		return $this->_valor;
	}

	public function getIdPersonaTipoContacto() {
		return $this->_idPersonaTipoContacto;
	}

	public function getIdPersona() {
		return $this->_idPersona;
	}

	public function setIdPersona($idPersona) {
		$this->_idPersona = $idPersona;
	}

	public function setIdTipoContacto($idTipoContacto) {
		$this->_idTipoContacto = $idTipoContacto;
	}

	public function setValor($valor) {
		$this->_valor = $valor;
	}


	// CREAR 

    private static function _crearContacto($datos) {
        $contacto = new Contacto();
			$contacto->_idPersonaTipoContacto = $datos["id_persona_tipo_contacto"];
			$contacto->_idPersona = $datos["id_persona"];
			$contacto->_idTipoContacto = $datos["id_tipo_contacto"];
			$contacto->_valor = $datos["valor"];
			$contacto->_descripcion = $datos["descripcion"];
        
        return $contacto;
    }


	public static function obtenerPorIdPersona($idPersona) {
		$sql = "SELECT ptc.id_persona_tipo_contacto, ptc.id_persona, ptc.id_tipo_contacto, ptc.valor, "
       		 . "tc.descripcion "
			 . "FROM personas_tipos_contactos ptc "
             . "INNER JOIN tipos_contactos tc ON tc.id_tipo_contacto = ptc.id_tipo_contacto "
             . "INNER JOIN personas p ON p.id_persona = ptc.id_persona "
             . "WHERE p.id_persona = {$idPersona}";

        $database = new MySQL();
        $datos = $database->consultar($sql);
    	$listadoContactos = [];

    	while ($registro = $datos->fetch_assoc()) {

    		$contacto = self::_crearContacto($registro);
    		$listadoContactos[] = $contacto;
    	}

    	return $listadoContactos;
	}
	

	public function guardar() {
		$sql = "INSERT INTO personas_tipos_contactos "
		     . "(id_persona_tipo_contacto, id_persona, id_tipo_contacto, valor) "
		     . "VALUES (NULL, {$this->_idPersona}, {$this->_idTipoContacto}, '{$this->_valor}')";

        $database = new MySQL();
        $idInsertado = $database->insertar($sql);

        $this->_idPersonaTipoContacto = $idInsertado;
	}

	public function darBaja($idPersonaTipoContacto) {

		$database = new MySQL();
		$sql = "DELETE FROM personas_tipos_contactos WHERE id_persona_tipo_contacto=" . $idPersonaTipoContacto;

        $database->darBaja($sql);
	}

}


?>