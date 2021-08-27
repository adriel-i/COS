<?php
require_once "../../menu.php";
require_once "../../class/Perfil.php";

$id_perfil = $_POST['txtIdPerfil'];
$descripcion = $_POST['txtDescripcion'];


$perfil = Perfil::obtenerPorId($id_perfil);

$perfil->setDescripcion($descripcion);

$perfil->actualizar();

header("location: listado_perfiles.php")
?>
