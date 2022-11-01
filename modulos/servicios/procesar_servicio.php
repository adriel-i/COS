<?php

require_once "../../class/Servicio.php";


$nombre = $_POST['txtNombre'];
$subcategoria = $_POST['cboSubcategoria'];


$servicio = new Servicio();

$servicio->setNombre($nombre);
$servicio->setIdSubcategoria($subcategoria);

$servicio->guardar();

header("location: listado_servicios.php")
?>
