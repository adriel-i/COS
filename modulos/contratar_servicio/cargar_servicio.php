<?php

require_once "../../class/Servicio.php";

$idSubcategoria = $_GET['id'];
$listadoServicios = Servicio::obtenerPorIdSubcategoria($idSubcategoria);

$respuesta = "";
$respuesta .= "<option value='0'>Seleccionar</option>";
$id = "";
$descripcion = "";

foreach ($listadoServicios as $servicio): 
    $selected = "";
    $id = $servicio->getIdServicio();
    $descripcion = $servicio->getNombre();

    $respuesta .= "<option value='$id'>$descripcion</option>";
endforeach;

echo $respuesta;

?>