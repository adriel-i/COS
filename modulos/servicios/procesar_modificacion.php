<?php
require_once "../../menu.php";
require_once "../../class/Servicio.php";
require_once "../../class/Subcategoria.php";

$id_servicio = $_POST['txtIdServicio'];
$nombre = $_POST['txtNombre'];
$idSubcategoria = $_POST['cboSubcategoria'];





$servicio = Servicio::obtenerPorId($id_servicio);

$servicio->setNombre($nombre);
$servicio->setIdSubcategoria($idSubcategoria);

$servicio->actualizar();

header("location: listado_servicios.php")
?>
