<?php

require_once "../../class/Genero.php";


$descripcion = $_POST['txtDescripcion'];


$genero = new Genero();

$genero->setDescripcion($descripcion);


$genero->guardar();

header("location: listado_generos.php")
?>
