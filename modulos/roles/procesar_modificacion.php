<?php
require_once "../../menu.php";
require_once "../../class/Rol.php";

$id_rol = $_POST['txtIdRol'];
$descripcion = $_POST['txtDescripcion'];


$rol = Rol::obtenerPorId($id_rol);

$rol->setDescripcion($descripcion);
$rol->actualizar();

header("location: listado_roles.php")
?>
