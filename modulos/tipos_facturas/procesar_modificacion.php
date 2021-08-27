<?php
require_once "../../menu.php";
require_once "../../class/TipoFactura.php";

$id_tipo_factura = $_POST['txtIdTipoFactura'];
$descripcion = $_POST['txtDescripcion'];


$tipoFactura = TipoFactura::obtenerPorId($id_tipo_factura);

$tipoFactura->setDescripcion($descripcion);
$tipoFactura->actualizar();

header("location: listado_tipos_facturas.php")
?>
