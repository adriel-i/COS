<?php
require_once "../../menu.php";
require_once "../../class/Rol.php";

$id_rol = $_GET['id_rol'];


$rol = new Rol();
$baja = $rol->darBaja($id_rol);

header("location: listado_roles.php")
?>
