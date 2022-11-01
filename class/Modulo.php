<?php

require_once "MySQL.php";
require_once "Perfil.php";

class Modulo {

    private $_idModulo;
    private $_descripcion;
    private $_directorio;



    public function getIdModulo()
    {
        return $this->_idModulo;
    }
    public function setIdModulo($_idModulo)
    {
        $this->_idModulo = $_idModulo;
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

    public function getDirectorio()
    {
        return $this->_directorio;
    }
    public function setDirectorio($_directorio)
    {
        $this->_directorio = $_directorio;
        return $this;
    }



    // CREAR MODULO

    private static function _crearModulo($datos) {
        $modulo = new Modulo();
        $modulo->_idModulo = $datos["id_modulo"];
        $modulo->_descripcion = $datos["descripcion"];
        $modulo->_directorio = $datos["directorio"];
        
        return $modulo;
    }


// OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM modulos ";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoModulos= [];

        while ($registro = $datos->fetch_assoc()) {
            $modulo = self::_crearModulo($registro);
            $listadoModulos[] = $modulo;
        }
        return $listadoModulos;
    }


    // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO modulos (`id_modulo`, `descripcion`, `directorio`) VALUES "
             . "(NULL, '{$this->_descripcion}', '{$this->_directorio}')";

        $database->insertar($sql);

    }

    // OBTENER POR ID

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM modulos "
             . "WHERE id_modulo=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $modulo = self::_crearModulo($registro);
        return $modulo;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE modulos set descripcion = '{$this->_descripcion}' "
                ."WHERE id_modulo = {$this->_idModulo}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "DELETE FROM perfiles_modulos WHERE id_modulo = " . $id;
        $database->darBaja($sql);
        $sql = "DELETE FROM modulos WHERE id_modulo = " . $id;
        $database->darBaja($sql);
    }


    public static function obtenerPorIdPerfil($idPerfil) {

        $sql = "SELECT m.id_modulo, m.descripcion, m.directorio "
             . "FROM modulos m "
             . "JOIN perfiles_modulos pm ON pm.id_modulo = m.id_modulo "
             . "JOIN perfiles p ON p.id_perfil = pm.id_perfil "
             . "WHERE pm.id_perfil = {$idPerfil}";
        // echo($sql);
        // exit;

        $databse = new MySQL();
        $datos = $databse->consultar($sql);
        $listadoModulos = [];

        while ($registro = $datos->fetch_assoc()) {

           $modulo = self::_crearModulo($registro);

            $listadoModulos[] = $modulo;
        }

        return $listadoModulos;

    }




}

?>