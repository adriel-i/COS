<?php

require_once "MySQL.php";
require_once "Contratacion.php";
require_once "Servicio.php";

class ServicioContratacion {
    private $_idServicioContratacion;
    private $_idUsuarioServicio;
    private $_idContratacion;

    public function getIdServicioContratacion(){
        return $this->_idServicioContratacion;
    }
    public function setIdServicioContratacion($_idServicioContratacion){
        $this->_idServicioContratacion = $_idServicioContratacion;
        return $this; 
    }
    public function getIdUsuarioServicio(){
        return $this->_idUsuarioServicio;
    }
    public function setIdUsuarioServicio($_idUsuarioServicio){
        $this->_idUsuarioServicio = $_idUsuarioServicio;
        return $this; 
    }
    public function getIdContratacion(){
        return $this->_idContratacion;
    }
    public function setIdContratacion($_idContratacion){
        $this->_idContratacion = $_idContratacion;
        return $this;
    }

    public function guardar(){
        $database = new MySQL();
        $sql = "INSERT INTO servicios_contrataciones(id_servicio_contratacion, id_contratacion, id_usuario_servicio) "
             . "VALUES (NULL, {$this->_idContratacion}, {$this->_idUsuarioServicio})";

        $idServicioContratacion = $database->insertar($sql);
        $this->_idServicioContratacion = $idServicioContratacion;
    }


    public function actualizar(){
        $database = new MySQL();
        $sql = "UPDATE servicios_contrataciones SET id_usuario_servicio = {$this->_idUsuarioServicio} "
             . "WHERE id_servicio_contratacion = {$this->_idServicioContratacion}";

        $database->actualizar($sql);
    }

    public static function obtenerTodos(){
        $sql = "SELECT * FROM servicios_contrataciones ";
        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoServicioContratacion = [];

        while ($registro = $datos->fetch_assoc()) {
            $servicioContratacion = new ServicioContratacion();
            $servicioContratacion->_idServicioContratacion = $registro["id_servicio_contratacion"];
            $servicioContratacion->_idContratacion = $registro["id_contratacion"];
            $servicioContratacion->_idUsuarioServicio = $registro["id_usuario_servicio"];
            $listadoServicioContratacion[] = $servicioContratacion;
        }
        
        return $listadoServicioContratacion;
    }

    public static function obtenerPorIdContratacion($idContratacion){
        $sql = "SELECT * FROM servicios_contrataciones WHERE id_contratacion = ". $idContratacion;
        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
        	return false;
        }
        $registro = $datos->fetch_assoc();
    	$servicioContratacion = self::_crearServicioContratacion($registro);
		return $servicioContratacion;
    }

    public static function obtenerPorId($idServicioContratacion) {
    	$sql = "SELECT * FROM servicios_contrataciones WHERE id_servicio_contratacion = ". $idServicioContratacion;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$servicioContratacion = self::_crearServicioContratacion($registro);
		return $servicioContratacion;

    }

    public function darBaja($id) {
		$database = new MySQL();
		$sql = "DELETE FROM servicios_contrataciones WHERE id_contratacion = " .$id;
        $database->darBaja($sql);
    }

    private static function _crearServicioContratacion($datos) {
    	$servicioContratacion = new ServicioContratacion();
		$servicioContratacion->_idServicioContratacion = $datos["id_servicio_contratacion"];
		$servicioContratacion->_idContratacion = $datos["id_contratacion"];
		$servicioContratacion->_idUsuarioServicio = $datos["id_usuario_servicio"];
		return $servicioContratacion;
    }

}

?>