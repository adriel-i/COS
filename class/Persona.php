<?php

require_once "MySQL.php";

class Persona {

    protected $_idPersona;
    protected $_nombre;
    protected $_apellido;
    protected $_dni;
    protected $_fechaNacimiento;
    protected $_nacionalidad;
    protected $_idGenero;
    public $genero;
    


    public function getIdPersona()
    {
        return $this->_idPersona;
    }

 
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }


    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }


    public function getApellido()
    {
        return $this->_apellido;
    }


    public function setApellido($_apellido)
    {
        $this->_apellido = $_apellido;

        return $this;
    }
     public function getDni()
    {
        return $this->_dni;
    }

 
    public function setDni($_dni)
    {
        $this->_dni = $_dni;

        return $this;
    }


    public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }


    public function setFechaNacimiento($_fechaNacimiento)
    {
        $this->_fechaNacimiento = $_fechaNacimiento;

        return $this;
    }
    public function getNacionalidad()
    {
        return $this->_nacionalidad;
    }

 
    public function setNacionalidad($_nacionalidad)
    {
        $this->_nacionalidad = $_nacionalidad;

        return $this;
    }

    public function getIdGenero()
    {
        return $this->_idGenero;
    }

    public function setIdGenero($_idGenero)
    {
        $this->_idGenero = $_idGenero;

        return $this;
    }

    public function guardar(){
        $database = new MySQL();

        $sql = "INSERT INTO personas (`id_persona`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `nacionalidad`, `id_genero` ) VALUES "
             ." (null, '{$this->_nombre}', '{$this->_apellido}', {$this->_dni}, '{$this->_fechaNacimiento}', '{$this->_nacionalidad}', {$this->_idGenero})";

       
        $idPersona = $database->insertar($sql);

        $this->_idPersona = $idPersona;
    }

    

    public function actualizar() {
        $sql = "UPDATE personas set nombre = '{$this->_nombre}', apellido = '{$this->_apellido}', dni = {$this->_dni}, fecha_nacimiento = '{$this->_fechaNacimiento}', "
                ."nacionalidad = '{$this->_nacionalidad}', id_genero = {$this->_idGenero} WHERE id_persona = {$this->_idPersona}";

        $database = new MySQL();
        $database->actualizar($sql);
    }


    public function __toString() {
        return "{$this->_apellido}, {$this->_nombre}";
    }

    // CREAR USUARIO

    private static function _crearPersona($datos) {
        $persona = new Persona();
        $persona->_idPersona = $datos["id_persona"];

        return $persona;
    }    


    // OBTENER POR ID

   public static function obtenerPorId($id) {

        $sql = "SELECT * from personas "
             . "WHERE id_persona=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $persona = self::_crearPersona($registro);
        return $persona;

    }
   
}


?>