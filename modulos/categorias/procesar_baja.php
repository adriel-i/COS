<?php
require_once "../../menu.php";
require_once "../../class/Categoria.php";

$id_categoria = $_GET['id_categoria'];


$categoria = new Categoria();
$baja = $categoria->darBaja($id_categoria);

header("location: listado_categorias.php")
?>
