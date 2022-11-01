<?php

require_once "../../class/Modulo.php";

$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];
$modulo = new Modulo();


$modulo->setDescripcion($descripcion);
$modulo->setDirectorio($directorio);
$modulo->guardar();

header("location: listado_modulos.php")
?>
