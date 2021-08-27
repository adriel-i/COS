<?php
require_once "../../menu.php";
require_once "../../class/TipoImpuesto.php";

$id_tipo_impuesto = $_POST['txtIdTipoImpuesto'];
$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['numPorcentaje'];

if ($porcentaje == ""):
    $porcentaje = "NULL";
endif;

$tipoImpuesto = TipoImpuesto::obtenerPorId($id_tipo_impuesto);

$tipoImpuesto->setDescripcion($descripcion);
$tipoImpuesto->setPorcentaje($porcentaje);
$tipoImpuesto->actualizar();

header("location: listado_tipos_impuestos.php")
?>
