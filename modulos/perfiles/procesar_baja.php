<?php
require_once "../../menu.php";
require_once "../../class/Perfil.php";

$id_perfil = $_GET['id_perfil'];


$perfil = new Perfil();
$baja = $perfil->darBaja($id_perfil);

header("location: listado_perfiles.php")
?>
