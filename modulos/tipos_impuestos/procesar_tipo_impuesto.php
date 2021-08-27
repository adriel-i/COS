<?php

require_once "../../class/TipoImpuesto.php";


$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['numPorcentaje'];

if ($porcentaje == ""):
    $porcentaje = "NULL";
endif;


$tipoImpuesto = new TipoImpuesto();

$tipoImpuesto->setDescripcion($descripcion);
$tipoImpuesto->setPorcentaje($porcentaje);


$tipoImpuesto->guardar();

header("location: listado_tipos_impuestos.php")
?>
