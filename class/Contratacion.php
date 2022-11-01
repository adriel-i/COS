<?php

require_once "MySQL.php";
require_once "Usuario.php";
require_once "Servicio.php";
require_once "UsuarioServicio.php";
require_once "EstadoContratacion.php";

class Contratacion {
	private $_idContratacion;
	private $_fechaHora;
    private $_costo;
    private $_observaciones;
    private $_idEstadoContratacion;
    private $_idUsuario;
    private $_idUsuarioServicio;

    public $estado;
    public $usuario;
    public $servicio;

    public function getIdContratacion() {
        return $this->_idContratacion;
    }
    public function getFechaHora() {
        return $this->_fechaHora;
    }
    public function setFechaHora($_fechaHora) {
        $this->_fechaHora = $_fechaHora;
        return $this;
    }
    public function getCosto() {
        return $this->_costo;
    }
    public function setCosto($_costo) {
        $this->_costo = $_costo;
        return $this;
    }
    public function getObservaciones() {
        return $this->_observaciones;
    }
    public function setObservaciones($_observaciones) {
        $this->_observaciones = $_observaciones;
        return $this;
    }
    public function getIdEstadoContratacion() {
        return $this->_idEstadoContratacion;
    }
    public function setIdEstadoContratacion($_idEstadoContratacion) {
        $this->_idEstadoContratacion = $_idEstadoContratacion;
        return $this;
    }
    public function getIdUsuario() {
        return $this->_idUsuario;
    }
    public function setIdUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
        return $this;
    }
    public function getIdUsuarioServicio() {
        return $this->_idUsuarioServicio;
    }
    public function setIdUsuarioServicio($_idUsuarioServicio) {
        $this->_idUsuarioServicio = $_idUsuarioServicio;
        return $this;
    }

    //OBTENER TODOS

    public static function obtenerTodos() {
    	$sql = "SELECT * from contrataciones";

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoContrataciones = [];

    	while ($registro = $datos->fetch_assoc()) {
            $contratacion = self::_crearContratacion($registro);
            $listadoContrataciones[] = $contratacion;
        }
    	return $listadoContrataciones;
    }

    // CREAR USUARIO
    private static function _crearContratacion($datos) {
        $contratacion = new Contratacion();
        $contratacion->_idContratacion = $datos["id_contratacion"];
        $contratacion->_fechaHora = $datos["fecha_hora"];
        $contratacion->_costo = $datos["costo"];
        $contratacion->_observaciones = $datos["observaciones"];
        $contratacion->_idUsuario = $datos["id_usuario"];
        $contratacion->_idUsuarioServicio = $datos["id_usuario_servicio"];
        $contratacion->_idEstadoContratacion = $datos["id_estado_contratacion"];
        $contratacion->estado = EstadoContratacion::obtenerPorId($contratacion->_idEstadoContratacion);
        $contratacion->usuario = Usuario::obtenerPorId($contratacion->_idUsuario);
        // $contratacion->servicio = UsuarioServicio::obtenerPorId($contratacion->_idUsuarioServicio);
        
        return $contratacion;
    }

    // GUARDAR

    public function guardar(){
    
        $database = new MySQL();
        $sql = "INSERT INTO contrataciones (`id_contratacion`, `fecha_hora`, `observaciones`, `id_estado_contratacion`, "
             . "`id_usuario`, `costo`, `id_usuario_servicio`) VALUES "
             . "(null, '{$this->_fechaHora}', '{$this->_observaciones}', 5, {$this->_idUsuario}, {$this->_costo}, {$this->_idUsuarioServicio})";

        $database->insertar($sql);
    }

    // ACTUALIZAR

    public function actualizar($idContratacion){
    
        $database = new MySQL();

        $sql = "UPDATE contrataciones SET fecha_hora = '{$this->_fechaHora}', costo = '{$this->_costo}' "
                ."observaciones = '{$this->_observaciones}', id_estado_contratacion = {$this->_idEstadoContratacion} "
                . "id_usuario = {$this->_idUsuario}, id_usuario_servicio = {$this->_idUsuarioServicio} "
                ."WHERE id_contratacion = ". $idContratacion;

        $database->actualizar($sql);
    }

    public function cambiarEstado ($idContratacion) {
        $database = new MySQL();
        $sql = "UPDATE contrataciones SET id_estado_contratacion = {$this->_idEstadoContratacion} "
                ."WHERE id_contratacion =" .$idContratacion;

        $database->actualizar($sql);
    }

    // BAJA

    public function darBaja($idContratacion){
    
        $database = new MySQL();
        $sql = "UPDATE facturas_detalles SET id_contratacion = NULL where id_contratacion = " . $idContratacion;
        $database->darBaja($sql);

        $sql = "DELETE FROM contrataciones WHERE id_contratacion = " . $idContratacion;
        $database->darBaja($sql);
    }

    public static function obtenerPorIdUsuario($idUsuario) {

        $sql = "SELECT * FROM contrataciones WHERE id_usuario = " . $idUsuario;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoContrataciones = [];

        while ($registro = $datos->fetch_assoc()) {
            $contratacion = self::_crearContratacion($registro);
            $listadoContrataciones[] = $contratacion;
        }
        return $listadoContrataciones;
    }

    public static function obtenerUltimoPorIdUsuario($idUsuario) {
        $sql = "SELECT * FROM contrataciones WHERE id_usuario = ". $idUsuario
                ." ORDER BY id_contratacion DESC LIMIT 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $contratacion = self::_crearContratacion($registro);
        return $contratacion;
    }

    public static function obtenerSolicitudes($idUsuario) {

        $sql = "SELECT c.id_contratacion, c.fecha_hora, c.costo, c.id_estado_contratacion, c.id_usuario, "
                ."c.observaciones, c.id_usuario_servicio FROM contrataciones c "
                ."JOIN usuarios_servicios us on c.id_usuario_servicio = us.id_usuario_servicio WHERE us.id_usuario = $idUsuario "
                ."ORDER BY c.id_contratacion DESC";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoContrataciones = [];

        while ($registro = $datos->fetch_assoc()) {
            $contratacion = self::_crearContratacion($registro);
            $listadoContrataciones[] = $contratacion;
        }
        return $listadoContrataciones;
    }

    public static function obtenerSolicitudesPorEstado($idUsuario, $estado) {

        $sql = "SELECT c.id_contratacion, c.fecha_hora, c.costo, c.id_estado_contratacion, c.id_usuario, "
                ."c.observaciones, c.id_usuario_servicio FROM contrataciones c "
                ."JOIN usuarios_servicios us on c.id_usuario_servicio = us.id_usuario_servicio WHERE us.id_usuario = $idUsuario "
                ."AND c.id_estado_contratacion = $estado ORDER BY c.id_contratacion DESC";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoContrataciones = [];

        while ($registro = $datos->fetch_assoc()) {
            $contratacion = self::_crearContratacion($registro);
            $listadoContrataciones[] = $contratacion;
        }
        return $listadoContrataciones;
    }
    
    public static function obtenerPorId($idContratacion) {

        $sql = "SELECT * FROM contrataciones WHERE id_contratacion= ".$idContratacion;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }
        $registro = $datos->fetch_assoc();
        $contratacion = self::_crearContratacion($registro);
        return $contratacion;
    }

    public static function obtenerPorIdServicio($servicio) {

        $sql = "SELECT * FROM contrataciones c JOIN usuarios_servicios us ON "
                ."c.id_usuario_servicio = us.id_usuario_servicio "
                ."JOIN servicios s ON us.id_servicio = s.id_servicio WHERE us.id_servicio = ".$servicio;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoContrataciones = [];

        while ($registro = $datos->fetch_assoc()) {
            $contratacion = self::_crearContratacion($registro);
            $listadoContrataciones[] = $contratacion;
        }
        return $listadoContrataciones;
    }

    public static function obtenerPorFecha($desde, $hasta) {

        $sql = "SELECT * FROM contrataciones WHERE fecha_hora BETWEEN '$desde' AND '$hasta'";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoContrataciones = [];

        while ($registro = $datos->fetch_assoc()) {
            $contratacion = self::_crearContratacion($registro);
            $listadoContrataciones[] = $contratacion;
        }
        return $listadoContrataciones;
    }

    public static function obtenerPorFechaYServicio($servicio, $desde, $hasta) {

        $sql = "SELECT * FROM contrataciones c JOIN usuarios_servicios us ON "
                ."c.id_usuario_servicio = us.id_usuario_servicio "
                ."JOIN servicios s ON us.id_servicio = s.id_servicio "
                ."WHERE c.fecha_hora BETWEEN '$desde' AND '$hasta' AND us.id_servicio = $servicio";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoContrataciones = [];

        while ($registro = $datos->fetch_assoc()) {
            $contratacion = self::_crearContratacion($registro);
            $listadoContrataciones[] = $contratacion;
        }
        return $listadoContrataciones;
    }


}

?>
