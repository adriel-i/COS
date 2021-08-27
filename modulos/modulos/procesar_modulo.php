<?php

require_once "../../class/Modulo.php";

$descripcion = $_POST['txtDescripcion'];
$modulo = new Modulo();


$modulo->setDescripcion($descripcion);
$modulo->guardar();

header("location: listado_modulos.php")
?>
