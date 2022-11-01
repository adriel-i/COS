<?php 

require_once "MySQL.php";

class Calificacion {
	private $_idCalificacion;
	private $_fechaHora;
	private $_valor;
	private $_idUsuario;
	private $_idUsuarioCalificado;

	
	public function getIdCalificacion() {
        return $this->_idCalificacion;
    }

 	public function getFechaHora() {
        return $this->_fechaHora;
    }
    public function setFechaHora($_fechaHora) {
        $this->_fechaHora = $_fechaHora;
    }
    public function getValor() {
        return $this->_valor;
    }
    public function setValor($_valor) {
        $this->_valor = $_valor;
    }
    public function getIdUsuario() {
        return $this->_idUsuario;
    }
    public function setIdUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
    }
    public function getIdUsuarioCalificado() {
        return $this->_idUsuarioCalificado;
    }
    public function setIdUsuarioCalificado($_idUsuarioCalificado) {
        $this->_idUsuarioCalificado = $_idUsuarioCalificado;
    }

    //CREAR CALIFICACION

    private static function _crearCalificacion($datos) {
        $calificacion = new Calificacion();
        $calificacion->_idCalificacion = $datos["id_calificacion"];
        $calificacion->_fechaHora = $datos["fecha_hora"];
        $calificacion->_valor = $datos["valor"];
        $calificacion->_idUsuario = $datos["id_usuario"];
        $calificacion->_idUsuarioCalificado = $datos["id_calificado"];
        
        return $calificacion;
    } 

    //GUARDAR

    public function guardar() {

        $database = new MySQL();

        $sql = "INSERT INTO calificaciones  VALUES "
            ."(NULL, now(), {$this->_valor}, {$this->_idUsuario}, {$this->_idUsuarioCalificado})";

        $database->insertar($sql);
    }

    //OBTENER POR ID USUARIO

    public static function obtenerPorIdUsuario($idUsuario) {

        $sql = "SELECT * FROM calificaciones "
             . "WHERE id_usuario=" . $idUsuario;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $calificacion = self::_crearCalificacion($registro);
        return $calificacion;
    }

    //ACTUALIZAR

    public function actualizar(){
    
        $database = new MySQL();
        $sql = "UPDATE calificaciones set valor = {$this->_valor} "
                ."WHERE id_usuario = {$this->_idUsuario} and id_calificado = {$this->_idUsuarioCalificado}";


        $database->actualizar($sql);
    }

    public static function validarUsuarioCalificacion($idUsuario, $idUsuarioCalificado) {

    $database = new MySQL();
    $sql = "SELECT * FROM calificaciones WHERE id_usuario = '$idUsuario' and id_calificado = '$idUsuarioCalificado'";

    $datos = $database->consultar($sql);

    if ($datos->num_rows == 0) {
        return false;
    }
    else {
        return true;
    }
    }

    // OBTENER CALIFICACION

    public static function obtenerCalificacion($idUsuario, $idUsuarioCalificado) {

        $sql = "SELECT * FROM calificaciones "
             . "WHERE id_usuario = '$idUsuario' and id_calificado = '$idUsuarioCalificado'";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $calificacion = self::_crearCalificacion($registro);
        return $calificacion;
    }

    // OBTENER PROMEDIO

    public static function obtenerPromedio($idUsuario) {

        $sql = "SELECT id_calificacion, fecha_hora, round(avg(valor)) as valor, id_usuario, id_calificado "
                ."FROM calificaciones WHERE id_calificado = ".$idUsuario;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoCalificaciones= [];

        while ($registro = $datos->fetch_assoc()) {

            $calificacion = self::_crearCalificacion($registro);
            $listadoCalificaciones[] = $calificacion;
        }
        return $listadoCalificaciones;
    }
    
}


?>