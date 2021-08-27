<?php
require_once "../../menu.php";
require_once "../../class/TipoImpuesto.php";

$id_tipo_impuesto = $_GET['id_tipo_impuesto'];


$tipoImpuesto = new TipoImpuesto();
$baja = $tipoImpuesto->darBaja($id_tipo_impuesto);

header("location: listado_tipos_impuestos.php")
?>
