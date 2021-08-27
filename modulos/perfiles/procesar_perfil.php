<?php

require_once "../../class/Perfil.php";


$descripcion = $_POST['txtDescripcion'];


$perfil = new Perfil();

$perfil->setDescripcion($descripcion);

$perfil->guardar();

header("location: listado_perfiles.php")
?>
