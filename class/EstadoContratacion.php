<?php

require_once "MySQL.php";

class EstadoContratacion {

    private $_idEstadoContratacion;
    private $_descripcion;

    public function getIdEstadoContratacion() {
        return $this->_idEstadoContratacion;
    }

    public function setIdEstadoContratacion($_idEstadoContratacion) {
        $this->_idEstadoContratacion = $_idEstadoContratacion;
        return $this;
    }

    public function getDescripcion() {
        return $this->_descripcion;
    }

    public function setDescripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
        return $this;
    }

    // CREAR PERFIL

    private static function _crearEstadoContratacion($datos) {
        $estadoContratacion = new EstadoContratacion();
        $estadoContratacion->_idEstadoContratacion = $datos["id_estado_contratacion"];
        $estadoContratacion->_descripcion = $datos["descripcion"];

        return $estadoContratacion;
    }


    // OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM estados_contrataciones";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoEstadoContrataciones= [];

        while ($registro = $datos->fetch_assoc()) {

            $estadoContratacion = self::_crearEstadoContratacion($registro);

            $listadoEstadoContrataciones[] = $estadoContratacion;
        }

        return $listadoEstadoContrataciones;
    }


    // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO estados_contrataciones (`id_estado_contratacion`, `descripcion` ) VALUES "
             . "(NULL, '{$this->_descripcion}')";

        $idPerfil = $database->insertar($sql);
        $this->_idEstadoContratacion = $idPerfil;

    }

    // OBTENER POR ID

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM estados_contrataciones "
             . "WHERE id_estado_contratacion=" . $id;
        // echo($sql);
        // exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $perfil = self::_crearEstadoContratacion($registro);
        return $perfil;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();
        $sql = "UPDATE estados_contrataciones set descripcion = '{$this->_descripcion}' "
                ."WHERE id_estado_contratacion = {$this->_idEstadoContratacion}";

        $database->actualizar($sql);
    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();
        $sql = "DELETE FROM estados_contrataciones WHERE id_estado_contratacion = " . $id;

        $database->darBaja($sql);
    }

}

?>
