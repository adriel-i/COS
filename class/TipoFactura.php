<?php  

require_once "MySQL.php";

class TipoFactura {

    private $_idTipoFactura;
    private $_descripcion;


    public function getIdTipoFactura()
    {
        return $this->_idTipoFactura;
    }
    public function setIdTipoFactura($_idTipoFactura)
    {
        $this->_idTipoFactura = $_idTipoFactura;
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



    // CREAR 

    private static function _crearTipoFactura($datos) {
        $tipoFactura = new TipoFactura();
        $tipoFactura->_idTipoFactura = $datos["id_tipo_factura"];
        $tipoFactura->_descripcion = $datos["descripcion"];
        
        return $tipoFactura;
    }

    // OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM tipos_facturas WHERE id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoTiposFacturas= [];

        while ($registro = $datos->fetch_assoc()) {

            $tipoFactura = self::_crearTipoFactura($registro);

            $listadoTiposFacturas[] = $tipoFactura;
        }

        return $listadoTiposFacturas;
    }


        // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO tipos_facturas VALUES "
             . "(NULL, '{$this->_descripcion}', 1)";

        $database->insertar($sql);
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM tipos_facturas "
             . "WHERE id_tipo_factura=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $tipoFactura = self::_crearTipoFactura($registro);
        return $tipoFactura;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE tipos_facturas set descripcion = '{$this->_descripcion}' "
                ."WHERE id_tipo_factura = {$this->_idTipoFactura}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE tipos_facturas SET id_estado_atributo = 2 WHERE id_tipo_factura = " . $id;
        
        $database->darBaja($sql);
    }


}

?>