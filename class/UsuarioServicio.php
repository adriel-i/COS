<?php

require_once "MySQL.php";
require_once "Servicio.php";
require_once "Usuario.php";

class UsuarioServicio {

    private $_idUsuarioServicio;
    private $_valor;
    private $_idServicio;
    private $_idUsuario;
    private $_idEstadoAtributo;

    public $servicio;
    public $usuario;

    public function getIdUsuarioServicio() {
        return $this->_idUsuarioServicio;
    }
    public function setIdUsuarioServicio($_idUsuarioServicio) {
        $this->_idUsuarioServicio = $_idUsuarioServicio;
        return $this;
    }
    public function getValor() {
        return $this->_valor;
    }
    public function setValor($_valor) {
        $this->_valor = $_valor;
        return $this;
    }
    public function getIdServicio() {
        return $this->_idServicio;
    }
    public function setIdServicio($_idServicio) {
        $this->_idServicio = $_idServicio;
        return $this;
    }
    public function getIdUsuario() {
        return $this->_idUsuario;
    }
    public function setIdUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
        return $this;
    }
    public function getIdEstadoAtributo() {
        return $this->_idEstadoAtributo;
    }
    public function setIdEstadoAtributo($_idEstadoAtributo) {
        $this->_idEstadoAtributo = $_idEstadoAtributo;
        return $this;
    }


    // OBTENER TODOS

    public static function obtenerTodos() {
        $sql = "SELECT * FROM usuarios_servicios where id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoUsuarioServicios= [];

        while ($registro = $datos->fetch_assoc()) {

            $usuarioServicio = self::_crearUsuarioServicio($registro);
            $listadoUsuarioServicios[] = $usuarioServicio;
        }
        return $listadoUsuarioServicios;
    }

    // GUARDAR

    public function guardar() {

        $database = new MySQL();
        $sql = "INSERT INTO usuarios_servicios (`id_usuario_servicio`, `valor`, `id_servicio`, `id_usuario`, `id_estado_atributo`) VALUES "
             . "(NULL, '{$this->_valor}', {$this->_idServicio}, {$this->_idUsuario}, {$this->_idEstadoAtributo})";

        $database->insertar($sql);
    }

    // OBTENER POR ID

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM usuarios_servicios "
             . "WHERE id_usuario_servicio=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $usuarioServicio = self::_crearUsuarioServicio($registro);
        return $usuarioServicio;
    }

    public static function obtenerPorIdUsuario($idUsuario){
        $sql = "SELECT * FROM usuarios_servicios WHERE id_estado_atributo = 1 and id_usuario = ". $idUsuario;

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoUsuarioServicios= [];

        while ($registro = $datos->fetch_assoc()) {

            $usuarioServicio = self::_crearUsuarioServicio($registro);
            $listadoUsuarioServicios[] = $usuarioServicio;
        }
        return $listadoUsuarioServicios;
    }

    public static function obtenerPorIdServicio($idServicio) {
        $sql = "SELECT u.id_usuario, us.id_usuario_servicio, us.valor, us.id_estado_atributo, s.id_servicio "
                ."FROM usuarios_servicios us JOIN servicios s ON us.id_servicio = s.id_servicio "
                ."JOIN usuarios u ON us.id_usuario = u.id_usuario where s.id_servicio = '$idServicio' "
                ."AND us.id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarioServicios= [];

        while ($registro = $datos->fetch_assoc()) {

            $usuarioServicio = self::_crearUsuarioServicio($registro);
            $listadoUsuarioServicios[] = $usuarioServicio;
        }
        return $listadoUsuarioServicios;
    }


    // CREAR SERVICIO
    private static function _crearUsuarioServicio($datos) {
        $usuarioServicio = new UsuarioServicio();
        $usuarioServicio->_idUsuarioServicio = $datos["id_usuario_servicio"];
        $usuarioServicio->_valor = $datos["valor"];
        $usuarioServicio->_idServicio = $datos["id_servicio"];
        $usuarioServicio->_idUsuario = $datos["id_usuario"];
        $usuarioServicio->_idEstadoAtributo = $datos["id_estado_atributo"];
        $usuarioServicio->servicio = Servicio::obtenerPorId($usuarioServicio->_idServicio);
        $usuarioServicio->usuario = Usuario::obtenerPorId($usuarioServicio->_idUsuario);
        
        return $usuarioServicio;
    }

    // ACTUALIZAR

    public function actualizar($idUsuarioServicio) {
    
        $database = new MySQL();

        $sql = "UPDATE usuarios_servicios set valor = '{$this->_valor}' "
                ."WHERE id_usuario_servicio = ". $idUsuarioServicio;

        $database->actualizar($sql);
    }

    // DAR DE BAJA

    public function darBaja($idUsuarioServicio){

        $database = new MySQL();

        $sql = "UPDATE usuarios_servicios SET id_estado_atributo = 2 WHERE id_usuario_servicio = " . $idUsuarioServicio;

        $database->darBaja($sql);
    }

    public static function obtenerPorNombreServicio($nombreServicio) {

        $sql = "SELECT * FROM usuarios_servicios us JOIN servicios s ON us.id_servicio = s.id_servicio "
                ."WHERE s.nombre LIKE '%$nombreServicio%' AND us.id_estado_atributo = 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarioServicios= [];

        while ($registro = $datos->fetch_assoc()) {

            $usuarioServicio = self::_crearUsuarioServicio($registro);
            $listadoUsuarioServicios[] = $usuarioServicio;
        }
        return $listadoUsuarioServicios;
    }

    public static function obtenerMasOfrecidos() {

        $sql = "SELECT s.nombre, COUNT(us.id_servicio) AS cantidad_ofrecida "
            ."FROM usuarios_servicios us RIGHT JOIN servicios s ON us.id_servicio = s.id_servicio "
            ."WHERE us.id_estado_atributo = 1 GROUP BY s.nombre "
            ."ORDER BY cantidad_ofrecida DESC LIMIT 6";
        $database = new MySQL();
        $datos = $database->consultar($sql);

        return $datos;
    }

    public static function obtenerMasRequeridos() {

        $sql = "SELECT c.id_usuario_servicio, s.nombre, COUNT(us.id_servicio) AS cantidad_requerida "
                ."from contrataciones c join usuarios_servicios us on c.id_usuario_servicio = us.id_usuario_servicio "
                ."RIGHT JOIN servicios s ON us.id_servicio = s.id_servicio GROUP BY s.nombre "
                ."order by cantidad_requerida desc limit 6";
            $database = new MySQL();
            $datos = $database->consultar($sql);

        return $datos;
    }

    public static function obtenerCantidadProfesionales() {

        $sql = "SELECT COUNT(u.id_usuario) AS cantidad_profesionales "
                ."FROM usuarios u join roles r ON u.id_rol = r.id_rol "
                ."WHERE u.id_estado_usuario = 1 AND u.id_rol = 2 OR u.id_rol = 4";
            $database = new MySQL();
            $datos = $database->consultar($sql);

        return $datos;
    }

    public static function obtenerCantidadProfesionalesContratados() {

        $sql = "SELECT COUNT(distinct(u.id_usuario)) AS cantidad_contratados "
                ."FROM usuarios u " 
                ."JOIN usuarios_servicios us ON u.id_usuario = us.id_usuario "
                ."JOIN roles r ON u.id_rol = r.id_rol "
                ."JOIN contrataciones c ON us.id_usuario_servicio = c.id_usuario_servicio "
                ."WHERE u.id_estado_usuario = 1 AND u.id_rol = 2 or u.id_rol = 4 "
                ."AND c.id_estado_contratacion = 4 AND us.id_estado_atributo = 1";
            $database = new MySQL();
            $datos = $database->consultar($sql);

        return $datos;
    }

    public static function obtenerPorIdSubcategoria($subcategoria) {

        $sql = "SELECT * , count(c.id_usuario_servicio) as cantidad_contratos FROM contrataciones c JOIN usuarios_servicios us ON "
                ."c.id_usuario_servicio = us.id_usuario_servicio "
                ."JOIN servicios s ON us.id_servicio = s.id_servicio "
                ."JOIN subcategorias su on s.id_subcategoria = su.id_subcategoria "
                ."WHERE s.id_subcategoria = $subcategoria order by count(c.id_usuario_servicio)";


        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarioServicios = [];

        while ($registro = $datos->fetch_assoc()) {
            $usuarioServicio = self::_crearUsuarioServicio($registro);
            $listadoUsuarioServicios[] = $usuarioServicio;
        }
        return $listadoUsuarioServicios;
    }

    // public static function obtenerPorIdUsuarioYServicio($idUsuario, $servicio) {

    // $database = new MySQL();
    // $sql = "SELECT * FROM usuarios_servicios WHERE id_estado_atributo = 1 AND id_usuario = $idUsuario AND id_servicio = $servicio";
    // $datos = $database->consultar($sql);

    // if ($datos->num_rows > 0) {
    //     return true;
    // }
    // else {
    //     return false;
    // }
    // }

}

?>
