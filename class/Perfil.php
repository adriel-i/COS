<?php

require_once "Modulo.php";
require_once "MySQL.php";

class Perfil {

    private $_idPerfil;
    private $_descripcion;
    private $_listadoModulos;


    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;
        return $this;
    }


    public function getDescripcion()
    {
        return $this->_descripcion;
    }
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;
        return $this;
    }

    public function getModulos() {
        return $this->_listadoModulos;
    }



// CREAR SUBCATEGORIA

    private static function _crearPerfil($datos) {
        $perfil = new Perfil();
        $perfil->_idPerfil = $datos["id_perfil"];
        $perfil->_descripcion = $datos["descripcion"];


        return $perfil;
    }

// OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM perfiles";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoPerfiles= [];

        while ($registro = $datos->fetch_assoc()) {

            $perfil = self::_crearPerfil($registro);

            $listadoPerfiles[] = $perfil;
        }

        return $listadoPerfiles;
    }


    // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO perfiles (`id_perfil`, `descripcion` ) VALUES "
             . "(NULL, '{$this->_descripcion}')";

        $database->insertar($sql);

    }

    // OBTENER POR ID

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM perfiles "
             . "WHERE id_perfil=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $perfil = self::_crearPerfil($registro);
        return $perfil;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE perfiles set descripcion = '{$this->_descripcion}' "
                ."WHERE id_perfil = {$this->_idPerfil}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "DELETE FROM perfiles WHERE id_perfil = " . $id;
        
        $database->darBaja($sql);
    }


}

?>
