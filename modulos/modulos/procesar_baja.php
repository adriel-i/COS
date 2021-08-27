<?php
require_once "../../menu.php";
require_once "../../class/Modulo.php";

$id_modulo = $_GET['id_modulo'];


$modulo = new Modulo();
$baja = $modulo->darBaja($id_modulo);

header("location: listado_modulos.php")
?>
