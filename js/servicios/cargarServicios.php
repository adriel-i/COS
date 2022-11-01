<?php


$idCategoria = $_GET['idCategoria'];

$respuesta = "";

$respuesta = "<option value='0'>Seleccionar</option>";

if ($idCategoria == 1) {
	$respuesta .= "<option value='1'>Formosa</option>";
	$respuesta .= "<option value='2'>Clorinda</option>";
} else if ($idCategoria == 2) {
	$respuesta .= "<option value='5'>Resistencia</option>";
	$respuesta .= "<option value='6'>Roque S. P.</option>";
}

echo $respuesta;


?>