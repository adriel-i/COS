<?php

require_once "../../class/Subcategoria.php";

$idCategoria = $_GET['id'];
$listadoSubcategorias = Subcategoria::obtenerPorIdCategoria($idCategoria);

$respuesta = "";
$respuesta .= "<option value='0'>Seleccionar</option>";
$id = "";
$descripcion = "";

foreach ($listadoSubcategorias as $subcategoria): 
    $selected = "";
    $id = $subcategoria->getIdSubcategoria();
    $descripcion = $subcategoria->getNombre();

    $respuesta .= "<option value='$id'>$descripcion</option>";
endforeach;

echo $respuesta;

?>