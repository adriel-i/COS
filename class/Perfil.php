<?php

require_once "MySQL.php";
require_once "Modulo.php";

class Perfil {

    private $_idPerfil;
    private $_descripcion;
    public $listadoModulos;

    public function getIdPerfil() {
        return $this->_idPerfil;
    }

    public function setIdPerfil($_idPerfil) {
        $this->_idPerfil = $_idPerfil;
        return $this;
    }

    public function getDescripcion() {
        return $this->_descripcion;
    }

    public function setDescripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
        return $this;
    }

    public function getModulos() {
        return $this->listadoModulos;
    }

    // CREAR PERFIL

    private static function _crearPerfil($datos) {
        $perfil = new Perfil();
        $perfil->_idPerfil = $datos["id_perfil"];
        $perfil->_descripcion = $datos["descripcion"];
        $perfil->listadoModulos = Modulo::obtenerPorIdPerfil($perfil->_idPerfil);


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

        $idPerfil = $database->insertar($sql);
        $this->_idPerfil = $idPerfil;

    }

    // OBTENER POR ID

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM perfiles "
             . "WHERE id_perfil=" . $id;
        // echo($sql);
        // exit;

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
        $sql = "DELETE FROM perfiles_modulos WHERE id_perfil = " . $id;
        $database->darBaja($sql);

        $sql = "UPDATE usuarios set id_perfil = 44 WHERE id_perfil = " . $id;
        $database->darBaja($sql);
        
        $sql = "DELETE FROM perfiles WHERE id_perfil = " . $id;
        $database->darBaja($sql);
    }

    //EXISTE MODULO?

    public function existeModulo($idModulo) {
        // consulto a la DB si este modulo existe
        // si existe, retorno true
        // sino retorno false

        return $datos->num_rows != 0;
    }


}

?>
