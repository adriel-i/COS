<?php  

require_once "MySQL.php";

class TipoImpuesto {

    private $_idTipoImpuesto;
    private $_descripcion;
    private $_porcentaje;


    public function getIdTipoImpuesto()
    {
        return $this->_idTipoImpuesto;
    }
    public function setIdTipoImpuesto($_idTipoImpuesto)
    {
        $this->_idTipoImpuesto = $_idTipoImpuesto;
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

    private static function _crearTipoImpuesto($datos) {
        $tipoImpuesto = new TipoImpuesto();
        $tipoImpuesto->_idTipoImpuesto = $datos["id_tipo_impuesto"];
        $tipoImpuesto->_descripcion = $datos["descripcion"];
        $tipoImpuesto->_porcentaje = $datos["porcentaje"];
        
        return $tipoImpuesto;
    }

    // OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM tipos_impuestos WHERE id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoTiposImpuestos= [];

        while ($registro = $datos->fetch_assoc()) {

            $tipoImpuesto = self::_crearTipoImpuesto($registro);

            $listadoTiposImpuestos[] = $tipoImpuesto;
        }

        return $listadoTiposImpuestos;
    }


        // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO tipos_impuestos VALUES "
             . "(NULL, '{$this->_descripcion}', {$this->_porcentaje}, 1)";

        $database->insertar($sql);

    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM tipos_impuestos "
             . "WHERE id_tipo_impuesto=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $tipoImpuesto = self::_crearTipoImpuesto($registro);
        return $tipoImpuesto;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE tipos_impuestos set descripcion = '{$this->_descripcion}', porcentaje = {$this->_porcentaje} "
                ."WHERE id_tipo_impuesto = {$this->_idTipoImpuesto}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE tipos_impuestos SET id_estado_atributo = 2 WHERE id_tipo_impuesto = " . $id;
        
        $database->darBaja($sql);
    }


}

?>