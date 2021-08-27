<?php

require_once "../../class/TipoVencimiento.php";


$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['numPorcentaje'];

if ($porcentaje == ""):
    $porcentaje = "NULL";
endif;


$tipoVencimiento = new TipoVencimiento();

$tipoVencimiento->setDescripcion($descripcion);
$tipoVencimiento->setPorcentaje($porcentaje);


$tipoVencimiento->guardar();

header("location: listado_tipos_vencimientos.php")
?>
