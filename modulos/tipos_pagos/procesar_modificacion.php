<?php
require_once "../../menu.php";
require_once "../../class/TipoPago.php";

$id_tipo_pago = $_POST['txtIdTipoPago'];
$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['numPorcentaje'];

if ($porcentaje == ""):
    $porcentaje = "NULL";
endif;

$tipoPago = TipoPago::obtenerPorId($id_tipo_pago);

$tipoPago->setDescripcion($descripcion);
$tipoPago->setPorcentaje($porcentaje);
$tipoPago->actualizar();

header("location: listado_tipos_pagos.php")
?>
