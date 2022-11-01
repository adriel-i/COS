<?php
require_once "../../menu.php";
require_once "../../class/Categoria.php";

$id_categoria = $_POST['txtIdCategoria'];
$nombre = $_POST['txtNombre'];


$categoria = Categoria::obtenerPorId($id_categoria);

$categoria->setNombre($nombre);

$categoria->actualizar();

header("location: listado_categorias.php")
?>
