<?php
require_once "../../menu.php";
require_once "../../class/Modulo.php";

$id_modulo = $_POST['txtIdModulo'];
$descripcion = $_POST['txtDescripcion'];


$modulo = Modulo::obtenerPorId($id_modulo);

$modulo->setDescripcion($descripcion);

$modulo->actualizar();

header("location: listado_modulos.php")
?>
