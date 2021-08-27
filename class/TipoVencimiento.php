<?php  

require_once "MySQL.php";

class TipoVencimiento {

    private $_idTipoVencimiento;
    private $_descripcion;
    private $_porcentaje;


    public function getIdTipoVencimiento()
    {
        return $this->_idTipoVencimiento;
    }
    public function setIdTipoVencimiento($_idTipoVencimiento)
    {
        $this->_idTipoVencimiento = $_idTipoVencimiento;
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

    public function getporcentaje()
    {
        return $this->_porcentaje;
    }
    public function setporcentaje($_porcentaje)
    {
        $this->_porcentaje = $_porcentaje;
        return $this;
    }



    // CREAR CATEGORIA

    private static function _crearTipoVencimiento($datos) {
        $tipoVencimiento = new TipoVencimiento();
        $tipoVencimiento->_idTipoVencimiento = $datos["id_tipo_vencimiento"];
        $tipoVencimiento->_descripcion = $datos["descripcion"];
        $tipoVencimiento->_porcentaje = $datos["porcentaje"];
        
        return $tipoVencimiento;
    }

    // OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM tipos_vencimientos WHERE id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoTiposVencimientos= [];

        while ($registro = $datos->fetch_assoc()) {

            $tipoVencimiento = self::_crearTipoVencimiento($registro);

            $listadoTiposVencimientos[] = $tipoVencimiento;
        }

        return $listadoTiposVencimientos;
    }


        // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO tipos_vencimientos VALUES "
             . "(NULL, '{$this->_descripcion}', {$this->_porcentaje}, 1)";

        $database->insertar($sql);
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM tipos_vencimientos "
             . "WHERE id_tipo_vencimiento=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $tipoVencimiento = self::_crearTipoVencimiento($registro);
        return $tipoVencimiento;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE tipos_vencimientos set descripcion = '{$this->_descripcion}', porcentaje = {$this->_porcentaje} "
                ."WHERE id_tipo_vencimiento = {$this->_idTipoVencimiento}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE tipos_vencimientos SET id_estado_atributo = 2 WHERE id_tipo_vencimiento = " . $id;
        
        $database->darBaja($sql);
    }


}

?>