<?php
require_once "../../menu.php";
require_once "../../class/Genero.php";

$id_genero = $_GET['id_genero'];


$genero = new Genero();
$baja = $genero->darBaja($id_genero);

header("location: listado_generos.php")
?>
