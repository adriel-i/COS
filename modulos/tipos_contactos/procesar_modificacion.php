<?php
require_once "../../menu.php";
require_once "../../class/TipoContacto.php";

$id_tipo_contacto = $_POST['txtIdTipoContacto'];
$descripcion = $_POST['txtDescripcion'];


$tipoContacto = TipoContacto::obtenerPorId($id_tipo_contacto);

$tipoContacto->setDescripcion($descripcion);
$tipoContacto->actualizar();

header("location: listado_tipos_contactos.php")
?>
