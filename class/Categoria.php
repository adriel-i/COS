<?php  

require_once "MySQL.php";

class Categoria {

    private $_idCategoria;
    private $_nombre;


    public function getIdCategoria() {
        return $this->_idCategoria;
    }

    public function setIdCategoria($_idCategoria) {
        $this->_idCategoria = $_idCategoria;

        return $this;
    }


    public function getNombre() {
        return $this->_nombre;
    }


    public function setNombre($_nombre) {
        $this->_nombre = $_nombre;

        return $this;
    }



    // CREAR CATEGORIA

    private static function _crearCategoria($datos) {
        $categoria = new Categoria();
        $categoria->_idCategoria = $datos["id_categoria"];
        $categoria->_nombre = $datos["nombre"];
        
        return $categoria;
    }

    // OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM categorias WHERE id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoCategorias= [];

        while ($registro = $datos->fetch_assoc()) {

            $categoria = self::_crearCategoria($registro);

            $listadoCategorias[] = $categoria;
        }

        return $listadoCategorias;
    }
    //OBTENER POR ID

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM categorias "
             . "WHERE id_categoria=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $categoria = self::_crearCategoria($registro);
        return $categoria;
    }


    // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO categorias (`id_categoria`, `nombre`, `id_estado_atributo`) VALUES "
             . "(NULL, '{$this->_nombre}', 1)";

        $database->insertar($sql);

    }

    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE categorias set nombre = '{$this->_nombre}' "
                ."WHERE id_categoria = {$this->_idCategoria}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE categorias SET id_estado_atributo = 2 WHERE id_categoria = " . $id;
        
        $database->darBaja($sql);
    }


}

?>