<?php 

require_once "MySQL.php";

class UsuarioCalificado {
	private $_idUsuarioCalificado;
	private $_idUsuario;
	
	public function getIdUsuarioCalificado() {
        return $this->_idUsuarioCalificado;
    }

 	public function getIdUsuario() {
        return $this->_idUsuario;
    }
    public function setIdUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
    }

    private static function _crearUsuarioCalificado($datos) {
        $usuarioCalificado = new UsuarioCalificado();
        $usuarioCalificado->_idUsuarioCalificado = $datos["id_calificado"];
        $usuarioCalificado->_idUsuario = $datos["id_usuario"];
        
        return $usuarioCalificado;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM usuarios_calificados";

        $database = new MySQL();
        $datos = $database->consultar($sql);
        $listadoUsuariosCalificado= [];

        while ($registro = $datos->fetch_assoc()) {

            $usuarioCalificado = self::_crearUsuarioCalificado($registro);

            $listadoUsuariosCalificado[] = $usuarioCalificado;
        }

        return $listadoUsuariosCalificado;
    }

    public function guardar() {

        $database = new MySQL();
        $sql = "INSERT INTO usuarios_calificados VALUES "
            . "(NULL, {$this->_idUsuario})";

        $database->insertar($sql);
    }

    public static function obtenerPorIdUsuario($idUsuario) {

        $sql = "SELECT * FROM usuarios_calificados "
             . "WHERE id_usuario=" . $idUsuario;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $usuarioCalificado = self::_crearUsuarioCalificado($registro);
        return $usuarioCalificado;
    }
    
}

?>