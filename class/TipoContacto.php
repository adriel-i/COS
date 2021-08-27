<?php

require_once "MySQL.php";

class TipoContacto {

	private $_idTipoContacto;
	private $_descripcion;

	public function getIdTipoContacto() {
		return $this->_idTipoContacto;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}
	public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;
        return $this;
    }


// CREAR 

    private static function _crearTipoContacto($datos) {
        $tipoContacto = new TipoContacto();
		$tipoContacto->_idTipoContacto = $datos["id_tipo_contacto"];
		$tipoContacto->_descripcion = $datos["descripcion"];
        
        return $tipoContacto;
    }


	public static function obtenerTodos()
	{
		$sql = "SELECT * FROM tipos_contactos";
		$database = new MySQL();
		$datos = $database->consultar($sql);
    	$listadoTiposContactos = [];

    	while ($registro = $datos->fetch_assoc()) {

	    	$tipoContacto = self::_crearTipoContacto($registro);
    		$listadoTiposContactos[] = $tipoContacto;
    	}
    	return $listadoTiposContactos;
	}


	// GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO tipos_contactos VALUES "
             . "(NULL, '{$this->_descripcion}')";

        $database->insertar($sql);
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM tipos_contactos "
             . "WHERE id_tipo_contacto=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $tipoContacto = self::_crearTipoContacto($registro);
        return $tipoContacto;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE tipos_contactos set descripcion = '{$this->_descripcion}' "
                ."WHERE id_tipo_contacto = {$this->_idTipoContacto}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE personas_tipos_contactos set id_tipo_contacto = NULL and valor = NULL WHERE id_tipo_contacto = " . $id;
        $database->darBaja($sql);

        $sql = " DELETE FROM tipos_contactos WHERE id_tipo_contacto = " . $id;
        $database->darBaja($sql);
    }

}



?>