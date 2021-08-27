<?php
require_once "../../menu.php";
require_once "../../class/TipoFactura.php";

$id_tipo_factura = $_GET['id_tipo_factura'];


$tipoFactura = new TipoFactura();
$baja = $tipoFactura->darBaja($id_tipo_factura);

header("location: listado_tipos_facturas.php")
?>
