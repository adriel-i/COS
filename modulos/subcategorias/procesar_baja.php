<?php
require_once "../../menu.php";
require_once "../../class/Subcategoria.php";

$id_subcategoria = $_GET['id_subcategoria'];


$subcategoria = new Subcategoria();
$baja = $subcategoria->darBaja($id_subcategoria);
header("location: listado_subcategorias.php")
?>
