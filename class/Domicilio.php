<?php


require_once "MySQL.php";

class Domicilio {

	private $_idDomicilio;
	private $_idPersona;
	private $_barrio;
	private $_calle;
	private $_altura;
	private $_manzana;
	private $_numeroCasa;
	private $_torre;
	private $_piso;
	private $_observaciones;

	public function getIdDomicilio() {
		return $this->_idDomicilio;
	}

	public function getidPersona() {
		return $this->_idPersona;
	}
	public function setidPersona($persona) {
		$this->_idPersona = $persona;
	}

	public function getBarrio() {
		return $this->_barrio;
	}
	public function setBarrio($barrio) {
		$this->_barrio = $barrio;
	}

	public function getCalle() {
		return $this->_calle;
	}
	public function setCalle($calle) {
		$this->_calle = $calle;
	}

	public function getAltura() {
		return $this->_altura;
	}
	public function setAltura($altura) {
		$this->_altura = $altura;
	}

	public function getManzana() {
		return $this->_manzana;
	}
	public function setManzana($manzana) {
		$this->_manzana = $manzana;
	}

	public function getNumeroCasa() {
		return $this->_numeroCasa;
	}
	public function setNumeroCasa($numeroCasa) {
		$this->_numeroCasa = $numeroCasa;
	}

	public function getTorre() {
		return $this->_torre;
	}
	public function setTorre($torre) {
		$this->_torre = $torre;
	}

	public function getPiso() {
		return $this->_piso;
	}
	public function setPiso($piso) {
		$this->_piso = $piso;
	}

	public function getObservaciones() {
		return $this->_observaciones;
	}
	public function setObservaciones($observaciones) {
		$this->_observaciones = $observaciones;
	}


	public static function _crearDomicilio ($datos){
	$domicilio = new Domicilio();

			$domicilio->_idDomicilio = $datos["id_domicilio"];
			$domicilio->_idPersona = $datos["id_persona"];
			$domicilio->_barrio = $datos["barrio"];
			$domicilio->_calle = $datos["calle"];
			$domicilio->_altura = $datos["altura"];
			$domicilio->_manzana = $datos["manzana"];
			$domicilio->_numeroCasa = $datos["numero_casa"];
			$domicilio->_torre = $datos["torre"];
			$domicilio->_piso = $datos["piso"];
			$domicilio->_observaciones = $datos["observaciones"];

		return $domicilio;
	}


	public static function obtenerPorIdPersona($idPersona) {
		$sql = "SELECT * FROM domicilios WHERE id_persona=" . $idPersona;

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoDomicilios = [];

    	while ($registro = $datos->fetch_assoc()) {

    		$domicilio = self::_crearDomicilio($registro);

    		$listadoDomicilios[] = $domicilio;
    	}


    	return $listadoDomicilios;
	}


	public function guardar() {

		$database = new MySQL();

		$sql = "INSERT INTO domicilios (id_domicilio, id_persona, barrio, calle, altura, manzana, numero_casa, torre, piso, observaciones) "
		     . "VALUES (NULL, {$this->_idPersona}, '{$this->_barrio}', '{$this->_calle}', '{$this->_altura}', "
		     . "'{$this->_manzana}', '{$this->_numeroCasa}', '{$this->_torre}', '{$this->_piso}', '{$this->_observaciones}')";
		// echo($sql);
		// exit;
		$database->insertar($sql);

	}

	public function darBaja($idDomicilio) {

		$database = new MySQL();
		$sql = "DELETE FROM domicilios WHERE id_domicilio=" . $idDomicilio;

        $database->darBaja($sql);
	}


	public static function obtenerPorId($id) {

        $sql = "SELECT * FROM domicilios "
             . "WHERE id_domicilio=" . $id;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $domicilio = self::_crearDomicilio($registro);
        return $domicilio;
    }

    public function actualizar(){
    
        $database = new MySQL();

        $sql = "UPDATE domicilios set barrio = '{$this->_barrio}', calle = '{$this->_calle}', altura = {$this->_altura}, "
        		."manzana = '{$this->_manzana}', numero_casa = {$this->_numeroCasa}, torre = '{$this->_torre}', "
        		."piso = {$this->_piso}, observaciones = '{$this->_observaciones}' "
                ."WHERE id_domicilio = {$this->_idDomicilio}";

        $database->actualizar($sql);
    }

}

?>
