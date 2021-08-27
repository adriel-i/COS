<?php

require_once "../../class/Categoria.php";


$nombre = $_POST['txtNombre'];


$categoria = new Categoria();

$categoria->setNombre($nombre);

$categoria->guardar();

header("location: listado_categorias.php")
?>
