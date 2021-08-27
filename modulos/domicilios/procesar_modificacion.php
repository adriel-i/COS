<?php

require_once "../../menu.php";
require_once "../../class/Domicilio.php";

$idPersona = $_GET['id_persona'];

$id_domicilio = $_POST['txtIdDomicilio'];
$barrio = $_POST['txtBarrio'];
$calle = $_POST['txtCalle'];
$altura = $_POST['numAltura'];
$manzana = $_POST['txtManzana'];
$numeroCasa = $_POST['numNroCasa'];
$torre = $_POST['txtTorre'];
$piso = $_POST['numPiso'];
$observaciones = $_POST['txtObservaciones'];

if ($altura == ""):
    $altura = "NULL";
endif;

if ($numeroCasa == ""):
    $numeroCasa = "NULL";
endif;

if ($piso == ""):
    $piso = "NULL";
endif;


$domicilio = Domicilio::obtenerPorId($id_domicilio);

$domicilio->setBarrio($barrio);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setManzana($manzana);
$domicilio->setNumeroCasa($numeroCasa);
$domicilio->setTorre($torre);
$domicilio->setPiso($piso);
$domicilio->setObservaciones($observaciones);

$domicilio->actualizar();

header("location: listado_domicilios.php?id_persona=". $idPersona);
?>
