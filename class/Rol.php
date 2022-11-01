<?php  

require_once "MySQL.php";

class Rol {

    private $_idRol;
    private $_descripcion;


    public function getIdRol()
    {
        return $this->_idRol;
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

    private static function _crearRol($datos) {
        $rol = new Rol();
        $rol->_idRol = $datos["id_rol"];
        $rol->_descripcion = $datos["descripcion"];
        
        return $rol;
    }

    // OBTENER TODOS

    public static function obtenerTodos()
    { 
        $sql = "SELECT * FROM roles ";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoRoles= [];

        while ($registro = $datos->fetch_assoc()) {

            $rol = self::_crearRol($registro);

            $listadoRoles[] = $rol;
        }

        return $listadoRoles;
    }


        // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO roles VALUES "
             . "(NULL, '{$this->_descripcion}')";

        $database->insertar($sql);
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM roles "
             . "WHERE id_rol=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $rol = self::_crearRol($registro);

        return $rol;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE roles set descripcion = '{$this->_descripcion}' "
                ."WHERE id_rol = {$this->_idRol}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE usuarios set id_rol = NULL WHERE id_rol = $id ";
        $database->darBaja($sql);

        $sql = " DELETE FROM roles WHERE id_rol = $id";
        $database->darBaja($sql);
        // HACER PRIMERO EL UPDATE EN UN SQL Y LUEGO EL DELETE EN OTRO SQL
    }

}

?>