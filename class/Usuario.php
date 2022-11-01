<?php

require_once "MySQL.php";
require_once "Persona.php";
require_once "Genero.php";
require_once "Rol.php";
require_once "Perfil.php";

class Usuario extends Persona {
// puede ponerse public siempre que sea un objeto de tal tipo en la clase, cuando hay una asociacion
	private $_idUsuario;
	private $_username;
	private $_idEstado;
    private $_contrasena;
	private $_estaLogueado;
    private $_idPerfil;
    public $perfil;
    private $_idRol;
    public $rol;


    public function getIdUsuario() {
        return $this->_idUsuario;
    }
    public function setIdUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
        return $this;
    }
    public function getUsername() {
        return $this->_username;
    }
    public function setUsername($_username) {
        $this->_username = $_username;
        return $this;
    }
    public function getContrasena() {
        return $this->_contrasena;
    }
    public function setContrasena($_contrasena) {
        $this->_contrasena = $_contrasena;
        return $this;
    }
    public function getIdEstado() {
        return $this->_idEstado;
    }
    public function setIdEstado($_idEstado) {
        $this->_idEstado = $_idEstado;
        return $this;
    }
    public function getIdPerfil() {
        return $this->_idPerfil;
    }
    public function setIdPerfil($_idPerfil) {
        $this->_idPerfil = $_idPerfil;
        return $this;
    }
    public function setPerfil($perfil) {
        $this->perfil = $perfil;
        return $this;
    }
    public function getIdRol() {
        return $this->_idRol;
    }
    public function setIdRol($_idRol) {
        $this->_idRol = $_idRol;
        return $this;
    }
    public function estaLogueado() {
    	return $this->_estaLogueado;
    }


    //OBTENER TODOS

    public static function obtenerTodos() {
    	$sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, "
             . "p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
             . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario, u.id_rol, u.id_perfil "
             . "FROM usuarios u "
             . "JOIN personas p ON p.id_persona = u.id_persona WHERE u.id_estado_usuario = 1 ";
             // echo($sql);
             // exit;
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoUsuarios = [];

    	while ($registro = $datos->fetch_assoc()) {
            $user = self::_crearUsuario($registro);
            $listadoUsuarios[] = $user;
        }
    	return $listadoUsuarios;
    }

    // LOGIN

    public static function login($username, $password) {
    	$sql = "SELECT * "
             . "FROM usuarios u "
             . "JOIN personas p ON p.id_persona = u.id_persona "
             . "WHERE username = '{$username}' and contrasena = '{$password}' and u.id_estado_usuario=1";

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$user = new Usuario();
    	if ($datos->num_rows > 0) {
            $registro = $datos->fetch_assoc();
            $user = self::_crearUsuario($registro);
            $user->_estaLogueado = true;

    	} else {
    		$user->_estaLogueado = false;
    	}
		return $user;
    }

    // OBTENER POR ID

   public static function obtenerPorId($id) {

        $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, "
             . "p.fecha_nacimiento, p.nacionalidad, p.id_genero, u.id_rol, "
             . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario, u.id_perfil "
             . "FROM usuarios u "
             . "JOIN personas p ON p.id_persona = u.id_persona "
             . "WHERE id_usuario=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }
        $registro = $datos->fetch_assoc();
        $usuario = self::_crearUsuario($registro);
        return $usuario;
    }

    // CREAR USUARIO

    private static function _crearUsuario($datos) {
        $user = new Usuario();
        $user->_idUsuario = $datos["id_usuario"];
        $user->_idPersona = $datos["id_persona"];
        $user->_username = $datos["username"];
        $user->_idEstado = $datos["id_estado_usuario"];
        $user->_nombre = $datos["nombre"];
        $user->_apellido = $datos["apellido"];
        $user->_dni = $datos["dni"];
        $user->_fechaNacimiento = $datos["fecha_nacimiento"];
        $user->_nacionalidad = $datos["nacionalidad"];
        $user->_idGenero = $datos["id_genero"];
        $user->_idPerfil = $datos["id_perfil"];
        $user->perfil = Perfil::obtenerPorId($user->_idPerfil);
        $user->_idRol = $datos["id_rol"];
        $user->genero = Genero::obtenerPorId($user->_idGenero);
        $user->rol = Rol::obtenerPorId($user->_idRol);

        return $user;
    }    

    // GUARDAR

    public function guardar(){
        parent::guardar();
    
        $database = new MySQL();
        $sql = "INSERT INTO usuarios (`id_usuario`, `contrasena`, `username`, `id_persona`, `id_rol`, `id_estado_usuario`, `id_perfil`) VALUES "
             . "(null, '{$this->_contrasena}', '{$this->_username}', {$this->_idPersona} , {$this->_idRol}, {$this->_idEstado}, {$this->_idPerfil})";

        $database->insertar($sql);
    }

    // ACTUALIZAR

    public function actualizar(){
        parent::actualizar();
    
        $database = new MySQL();

        $sql = "UPDATE usuarios set username = '{$this->_username}', contrasena = '{$this->_contrasena}', id_rol = {$this->_idRol}, "
                . "id_perfil = {$this->_idPerfil} "
                ."WHERE id_usuario = {$this->_idUsuario}";

        $database->actualizar($sql);
    }

    // BAJA

    public function darBaja($id){
    
        $database = new MySQL();
        $sql = "UPDATE usuarios set id_estado_usuario = 2 "
                ."WHERE id_usuario = " . $id;

        $database->darBaja($sql);
    }

    public static function obtenerPorIdPersona($idPersona) {

        $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, "
             . "p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
             . "u.id_usuario, u.username, u.contrasena, u.id_rol, u.id_estado_usuario, u.id_perfil "
             . "FROM usuarios u "
             . "JOIN personas p ON p.id_persona = u.id_persona "
             . "WHERE u.id_persona=" . $idPersona;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }
        $registro = $datos->fetch_assoc();
        $usuario = self::_crearUsuario($registro);
        return $usuario;
    }

    public static function obtenerPorUsername($username) {

        $sql = "SELECT * FROM usuarios u "
             . "JOIN personas p ON p.id_persona = u.id_persona "
             . "WHERE u.username='$username'";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $registro = $datos->fetch_assoc();
        $usuario = self::_crearUsuario($registro);
        return $usuario;
    }

    public static function validarUsuario($username) {

    $database = new MySQL();
    $sql = "SELECT * FROM usuarios WHERE username = ".$username;
    $datos = $database->consultar($sql);

    if ($datos->num_rows > 0) {
        return true;
    }
    else {
        return false;
    }
    }

    public static function obtenerProfesionales() {
        $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, "
             . "p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
             . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario, u.id_rol, u.id_perfil "
             . "FROM usuarios u "
             . "JOIN personas p ON p.id_persona = u.id_persona WHERE u.id_estado_usuario = 1 "
             . "AND u.id_rol = 2 OR u.id_rol = 4";
             // echo($sql);
             // exit;
        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarios = [];

        while ($registro = $datos->fetch_assoc()) {
            $user = self::_crearUsuario($registro);
            $listadoUsuarios[] = $user;
        }
        return $listadoUsuarios;
    }

    public static function obtenerProfesionalMasContratadoPorSubcategoria($subcategoria) {

        $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
                . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario, u.id_rol, u.id_perfil, "
                ."count(c.id_usuario_servicio) as cantidad_contratos FROM usuarios u "
                ."JOIN personas p ON p.id_persona = u.id_persona "
                ."JOIN usuarios_servicios us ON u.id_usuario = us.id_usuario "
                ."JOIN contrataciones c ON us.id_usuario_servicio = c.id_usuario_servicio "
                ."JOIN servicios s ON us.id_servicio = s.id_servicio "
                ."JOIN subcategorias su on s.id_subcategoria = su.id_subcategoria "
                ."WHERE s.id_subcategoria = $subcategoria order by count(c.id_usuario_servicio)";
                // echo($sql);
                // exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarios = [];

        while ($registro = $datos->fetch_assoc()) {
            $usuario = self::_crearUsuario($registro);
            $listadoUsuarios[] = $usuario;
        }
        return $listadoUsuarios;
    }

    public static function obtenerProfesionalMasContratadoPorFecha($desde, $hasta) {

        $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
                . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario, u.id_rol, u.id_perfil, "
                ."count(c.id_usuario_servicio) as cantidad_contratos FROM usuarios u "
                ."JOIN personas p ON p.id_persona = u.id_persona "
                ."JOIN usuarios_servicios us ON u.id_usuario = us.id_usuario "
                ."JOIN contrataciones c ON us.id_usuario_servicio = c.id_usuario_servicio "
                ."WHERE c.fecha_hora between '$desde' and '$hasta' group by u.id_usuario order by cantidad_contratos desc limit 1";
                // echo($sql);
                // exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarios = [];

        while ($registro = $datos->fetch_assoc()) {
            $usuario = self::_crearUsuario($registro);
            $listadoUsuarios[] = $usuario;
        }
        return $listadoUsuarios;
    }


    public static function obtenerCantidadContratosDeProfesionales() {

        $sql = "SELECT count(c.id_usuario_servicio) as cantidad_contratos FROM usuarios u "
                ."JOIN personas p ON p.id_persona = u.id_persona " 
                ."JOIN usuarios_servicios us ON u.id_usuario = us.id_usuario " 
                ."JOIN contrataciones c ON us.id_usuario_servicio = c.id_usuario_servicio " 
                ."group by u.id_usuario ";
            $database = new MySQL();
            $datos = $database->consultar($sql);

        return $datos;
    }

    public static function obtenerProfesionalMasContratadoPorServicioYFecha($servicio, $desde, $hasta) {

        $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
                . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario, u.id_rol, u.id_perfil, "
                ."count(c.id_usuario_servicio) as cantidad_contratos FROM usuarios u "
                ."JOIN personas p ON p.id_persona = u.id_persona "
                ."JOIN usuarios_servicios us ON u.id_usuario = us.id_usuario "
                ."JOIN contrataciones c ON us.id_usuario_servicio = c.id_usuario_servicio "
                ."JOIN servicios s ON us.id_servicio = s.id_servicio "
                ."JOIN subcategorias su on s.id_subcategoria = su.id_subcategoria "
                ."WHERE s.id_servicio = $servicio AND c.fecha_hora between '$desde' and '$hasta' "
                ." order by cantidad_contratos desc limit 1";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarios = [];

        while ($registro = $datos->fetch_assoc()) {
            $usuario = self::_crearUsuario($registro);
            $listadoUsuarios[] = $usuario;
        }
        return $listadoUsuarios;
    }

}

?>
