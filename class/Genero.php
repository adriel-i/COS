<?php  

require_once "MySQL.php";

class Genero {

    private $_idGenero;
    private $_descripcion;


    public function getIdGenero()
    {
        return $this->_idGenero;
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




    // CREAR 

    private static function _crearGenero($datos) {
        $genero = new Genero();
        $genero->_idGenero = $datos["id_genero"];
        $genero->_descripcion = $datos["descripcion"];
        
        return $genero;
    }

    // OBTENER TODOS

    public static function obtenerTodos()
    { 
        $sql = "SELECT * FROM generos ";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoGeneros= [];

        while ($registro = $datos->fetch_assoc()) {

            $genero = self::_crearGenero($registro);

            $listadoGeneros[] = $genero;
        }

        return $listadoGeneros;
    }


        // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO generos VALUES "
             . "(NULL, '{$this->_descripcion}')";

        $database->insertar($sql);
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM generos "
             . "WHERE id_genero=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $genero = self::_crearGenero($registro);

        return $genero;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE generos set descripcion = '{$this->_descripcion}' "
                ."WHERE id_genero = {$this->_idGenero}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE personas set id_genero = NULL WHERE id_genero = $id ";
        $database->darBaja($sql);

        $sql = " DELETE FROM generos WHERE id_genero = $id";
        $database->darBaja($sql);
        // HACER PRIMERO EL UPDATE EN UN SQL Y LUEGO EL DELETE EN OTRO SQL
    }

}

?>