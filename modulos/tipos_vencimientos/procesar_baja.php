<?php
require_once "../../menu.php";
require_once "../../class/TipoVencimiento.php";

$id_tipo_vencimiento = $_GET['id_tipo_vencimiento'];


$tipoVencimiento = new TipoVencimiento();
$baja = $tipoVencimiento->darBaja($id_tipo_vencimiento);

header("location: listado_tipos_vencimientos.php")
?>
