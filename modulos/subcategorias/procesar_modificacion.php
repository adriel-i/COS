<?php
require_once "../../menu.php";
require_once "../../class/Subcategoria.php";
require_once "../../class/Categoria.php";

$id_subcategoria = $_POST['txtIdSubcategoria'];
$nombre = $_POST['txtNombre'];
$idCategoria = $_POST['cboCategoria'];





$subcategoria = Subcategoria::obtenerPorId($id_subcategoria);

$subcategoria->setNombre($nombre);
$subcategoria->setIdCategoria($idCategoria);

$subcategoria->actualizar();

header("location: listado_subcategorias.php")
?>
