<?php

require_once "../../class/TipoPago.php";


$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['numPorcentaje'];

if ($porcentaje == ""):
    $porcentaje = "NULL";
endif;


$tipoPago = new TipoPago();

$tipoPago->setDescripcion($descripcion);
$tipoPago->setPorcentaje($porcentaje);


$tipoPago->guardar();

header("location: listado_tipos_pagos.php")
?>
