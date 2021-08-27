<?php  

require_once "MySQL.php";

class TipoPago {

    private $_idTipoPago;
    private $_descripcion;
    private $_porcentaje;


    public function getIdTipoPago()
    {
        return $this->_idTipoPago;
    }
    public function setIdTipoPago($_idTipoPago)
    {
        $this->_idTipoPago = $_idTipoPago;
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

    private static function _crearTipoPago($datos) {
        $tipoPago = new TipoPago();
        $tipoPago->_idTipoPago = $datos["id_tipo_pago"];
        $tipoPago->_descripcion = $datos["descripcion"];
        $tipoPago->_porcentaje = $datos["porcentaje"];
        
        return $tipoPago;
    }

    // OBTENER TODOS

    public static function obtenerTodos()
    {
        $sql = "SELECT * FROM tipos_pagos WHERE id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoTiposPagos= [];

        while ($registro = $datos->fetch_assoc()) {

            $tipoPago = self::_crearTipoPago($registro);

            $listadoTiposPagos[] = $tipoPago;
        }

        return $listadoTiposPagos;
    }


        // GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO tipos_pagos VALUES "
             . "(NULL, '{$this->_descripcion}', {$this->_porcentaje}, 1)";

        $database->insertar($sql);

    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM tipos_pagos "
             . "WHERE id_tipo_pago=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $tipoPago = self::_crearTipoPago($registro);
        return $tipoPago;
    }



    // ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE tipos_pagos set descripcion = '{$this->_descripcion}', porcentaje = {$this->_porcentaje} "
                ."WHERE id_tipo_pago = {$this->_idTipoPago}";


        $database->actualizar($sql);


    }

    // DAR DE BAJA

    public function darBaja($id){

        $database = new MySQL();

        $sql = "UPDATE tipos_pagos SET id_estado_atributo = 2 WHERE id_tipo_pago = " . $id;
        
        $database->darBaja($sql);
    }


}

?>