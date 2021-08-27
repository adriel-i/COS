<?php
require_once "../../menu.php";
require_once "../../class/TipoVencimiento.php";

$id_tipo_vencimiento = $_POST['txtIdTipoVencimiento'];
$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['numPorcentaje'];

if ($porcentaje == ""):
    $porcentaje = "NULL";
endif;


$tipoVencimiento = TipoVencimiento::obtenerPorId($id_tipo_vencimiento);

$tipoVencimiento->setDescripcion($descripcion);
$tipoVencimiento->setPorcentaje($porcentaje);
$tipoVencimiento->actualizar();

header("location: listado_tipos_vencimientos.php")
?>
