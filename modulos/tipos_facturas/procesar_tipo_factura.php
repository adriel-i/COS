<?php

require_once "../../class/TipoFactura.php";


$descripcion = $_POST['txtDescripcion'];


$tipoFactura = new TipoFactura();

$tipoFactura->setDescripcion($descripcion);


$tipoFactura->guardar();

header("location: listado_tipos_facturas.php")
?>
