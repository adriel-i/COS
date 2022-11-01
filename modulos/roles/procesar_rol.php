<?php

require_once "../../class/Rol.php";


$descripcion = $_POST['txtDescripcion'];


$rol = new Rol();

$rol->setDescripcion($descripcion);


$rol->guardar();

header("location: listado_roles.php")
?>
