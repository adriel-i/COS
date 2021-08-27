<?php

require_once "MySQL.php";
require_once "Categoria.php";

class Subcategoria {

    private $_idSubcategoria;
    private $_nombre;
    private $_idCategoria;
    public $categoria;


    public function getIdSubcategoria()
    {
        return $this->_idSubcategoria;
    }
    public function setIdSubcategoria($_idSubcategoria)
    {
        $this->_idSubcategoria = $_idSubcategoria;

        return $this;
    }


    public function getNombre()
    {
        return $this->_nombre;
    }


    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }


    public function getIdCategoria()
    {
        return $this->_idCategoria;
    }
    public function setIdCategoria($_idCategoria)
    {
        $this->_idCategoria = $_idCategoria;

        return $this;
    }


// OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM subcategorias WHERE id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoSubcategorias= [];

        while ($registro = $datos->fetch_assoc()) {

            $subcategoria = self::_crearSubcategoria($registro);

            $listadoSubcategorias[] = $subcategoria;
        }

        return $listadoSubcategorias;
    }


    // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO subcategorias (`id_subcategoria`, `nombre`, `id_categoria`) VALUES "
             . "(NULL, '{$this->_nombre}', {$this->_idCategoria})";

        $database->insertar($sql);

    }

    // OBTENER POR ID

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM subcategorias "
             . "WHERE id_subcategoria=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $subcategoria = self::_crearSubcategoria($registro);
        return $subcategoria;
    }


    // CREAR SUBCATEGORIA

    private static function _crearSubcategoria($datos) {
        $subcategoria = new Subcategoria();
        $subcategoria->_idSubcategoria = $datos["id_subcategoria"];
        $subcategoria->_nombre = $datos["nombre"];
        $subcategoria->_idCategoria = $datos["id_categoria"];
        $subcategoria->categoria = Categoria::obtenerPorId($subcategoria->_idCategoria);
        
        return $subcategoria;
    }


    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE subcategorias set nombre = '{$this->_nombre}', id_categoria = {$this->_idCategoria} "
                ."WHERE id_subcategoria = {$this->_idSubcategoria}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE subcategorias SET id_estado_atributo = 2 WHERE id_subcategoria = " . $id;
        
        $database->darBaja($sql);
    }





}

?>
