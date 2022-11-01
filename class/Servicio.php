<?php

require_once "MySQL.php";
require_once "Subcategoria.php";

class Servicio {

    private $_idServicio;
    private $_nombre;
    private $_idSubcategoria;
    public $subcategoria;

    // ID SERVICIO

    public function getIdServicio() {
        return $this->_idServicio;
    }
    public function setIdServicio($_idServicio) {
        $this->_idServicio = $_idServicio;
        return $this;
    }

    // NOMBRE

    public function getNombre() {
        return $this->_nombre;
    }
    public function setNombre($_nombre) {
        $this->_nombre = $_nombre;
        return $this;
    }

    // ID SUBCATEGORIA

    public function getIdSubcategoria() {
        return $this->_idSubcategoria;
    }
    public function setIdSubcategoria($_idSubcategoria) {
        $this->_idSubcategoria = $_idSubcategoria;
        return $this;
    }



    // OBTENER TODOS

    public static function obtenerTodos() {
        $sql = "SELECT * FROM servicios WHERE id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoServicios= [];

        while ($registro = $datos->fetch_assoc()) {

            $servicio = self::_crearServicio($registro);
            $listadoServicios[] = $servicio;
        }

        return $listadoServicios;
    }

    // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO servicios (`id_servicio`, `nombre`, `id_subcategoria`, `id_estado_atributo`) VALUES "
             . "(NULL, '{$this->_nombre}', {$this->_idSubcategoria}, 1)";

        $database->insertar($sql);

    }

    // OBTENER POR ID

    public static function obtenerPorId($idServicio) {

        $sql = "SELECT * FROM servicios WHERE id_servicio=" . $idServicio;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $servicio = self::_crearServicio($registro);
        return $servicio;
    }

    // CREAR SERVICIO
    private static function _crearServicio($datos) {
        $servicio = new Servicio();
        $servicio->_idServicio = $datos["id_servicio"];
        $servicio->_nombre = $datos["nombre"];
        $servicio->_idSubcategoria = $datos["id_subcategoria"];
        $servicio->subcategoria = Subcategoria::obtenerPorId($servicio->_idSubcategoria);
        
        return $servicio;
    }

    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE servicios set nombre = '{$this->_nombre}', id_subcategoria = {$this->_idSubcategoria} "
                ."WHERE id_servicio = {$this->_idServicio}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE servicios SET id_estado_atributo = 2 WHERE id_servicio = " . $id;
        
        $database->darBaja($sql);
    }

    public static function obtenerPorIdSubcategoria($idSubcategoria) {

        $sql = "SELECT * FROM servicios "
             . "WHERE id_subcategoria=" . $idSubcategoria;

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoServicios= [];

        while ($registro = $datos->fetch_assoc()) {

            $servicio = self::_crearServicio($registro);

            $listadoServicios[] = $servicio;
        }

        return $listadoServicios;
    }
    

}

?>
