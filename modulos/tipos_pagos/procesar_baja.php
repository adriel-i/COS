<?php
require_once "../../menu.php";
require_once "../../class/TipoPago.php";

$id_tipo_pago = $_GET['id_tipo_pago'];


$tipoPago = new TipoPago();
$baja = $tipoPago->darBaja($id_tipo_pago);

header("location: listado_tipos_pagos.php")
?>
