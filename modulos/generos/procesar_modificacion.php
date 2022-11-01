<?php
require_once "../../menu.php";
require_once "../../class/Genero.php";

$id_genero = $_POST['txtIdGenero'];
$descripcion = $_POST['txtDescripcion'];


$genero = Genero::obtenerPorId($id_genero);

$genero->setDescripcion($descripcion);
$genero->actualizar();

header("location: listado_generos.php")
?>
