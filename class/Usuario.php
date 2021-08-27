<?php


require_once "MySQL.php";
require_once "Persona.php";
require_once "Genero.php";
require_once "Perfil.php";



class Usuario extends Persona {

	private $_idUsuario;
	private $_username;
	private $_idEstado;
    private $_contrasena;
	private $_estaLogueado;
    private $_idPerfil;
    public $perfil;



    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;
        return $this;
    }

    //USERNAME

    public function getUsername()
    {
        return $this->_username;
    }
    public function setUsername($_username)
    {
        $this->_username = $_username;
        return $this;
    }

    // CONTRASENA

    public function getContrasena()
    {
        return $this->_contrasena;
    }
    public function setContrasena($_contrasena)
    {
        $this->_contrasena = $_contrasena;
        return $this;
    }

    // ESTADO

    public function getIdEstado()
    {
        return $this->_idEstado;
    }
    public function setIdEstado($_idEstado)
    {
        $this->_idEstado = $_idEstado;
        return $this;
    }

    // PERFIL

    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;
        return $this;
    }

    // LOGEADO

    public function estaLogueado()
    {
    	return $this->_estaLogueado;
    }

    //OBTENER TODOS

    public static function obtenerTodos() {
    	$sql = "SELECT p.id_persona, p.nombre, p.apellido, p.dni, "
             . "p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
             . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario "
             . "FROM usuarios u "
             . "JOIN personas p ON p.id_persona = u.id_persona WHERE u.id_estado_usuario = 1 ";

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
    	$sql = "SELECT p.id_persona, p.nombre, p.apellido, "
             . "p.fecha_nacimiento, u.id_usuario, u.username, "
             . "u.id_estado_usuario "
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
             . "p.fecha_nacimiento, p.nacionalidad, p.id_genero, "
             . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario "
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
        $user->perfil = 'algo';
        $user->genero = Genero::obtenerPorId($user->_idGenero);

        return $user;
    }    

    // GUARDAR

    public function guardar(){
        parent::guardar();
    
        $database = new MySQL();
        $sql = "INSERT INTO usuarios (`id_usuario`, `contrasena`, `username`, `id_persona`, `id_estado_usuario`) VALUES "
             . "(null, '{$this->_contrasena}', '{$this->_username}', {$this->_idPersona} , {$this->_idEstado})";
    

        $database->insertar($sql);
    }

    // ACTUALIZAR

    public function actualizar(){
        parent::actualizar();
    
        $database = new MySQL();

        $sql = "UPDATE usuarios set username = '{$this->_username}', contrasena = '{$this->_contrasena}' "
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
             . "u.id_usuario, u.username, u.contrasena, u.id_estado_usuario "
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
}

?>