<?php
require_once "../../menu.php";
require_once "../../class/Perfil.php";
require_once "../../class/PerfilModulo.php";

$idPerfil = $_GET['id_perfil'];

$perfilModulo = new PerfilModulo();
$baja = $perfilModulo->darBaja($idPerfil);

$perfil = new Perfil();
$baja = $perfil->darBaja($idPerfil);

header("location: listado_perfiles.php");

?>