<?php

require_once "../../class/Subcategoria.php";


$nombre = $_POST['txtNombre'];
$categoria = $_POST['cboCategoria'];


$subcategoria = new Subcategoria();

$subcategoria->setNombre($nombre);
$subcategoria->setIdCategoria($categoria);

$subcategoria->guardar();

header("location: listado_subcategorias.php")
?>
