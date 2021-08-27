<?php

require_once "../../class/TipoContacto.php";


$descripcion = $_POST['txtDescripcion'];


$tipoContacto = new TipoContacto();

$tipoContacto->setDescripcion($descripcion);


$tipoContacto->guardar();

header("location: listado_tipos_contactos.php")
?>
