<?php
require_once "../../menu.php";
require_once "../../class/TipoContacto.php";

$id_tipo_contacto = $_GET['id_tipo_contacto'];


$tipoContacto = new TipoContacto();
$baja = $tipoContacto->darBaja($id_tipo_contacto);

header("location: listado_tipos_contactos.php")
?>
