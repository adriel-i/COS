<?php

require_once "../../menu.php";
require_once "../../class/Domicilio.php";

$idPersona = $_GET['id_persona'];

$id_domicilio = $_POST['txtIdDomicilio'];
$barrio = trim($_POST["txtBarrio"]);
$calle = trim($_POST["txtCalle"]);
$altura = $_POST["numAltura"];
$manzana = trim($_POST["txtManzana"]);
$numeroCasa = $_POST["numNroCasa"];
$torre = trim($_POST["txtTorre"]);
$piso = $_POST["numPiso"];
$observaciones = trim($_POST["txtObservaciones"]);

if ($altura == ""){
    $altura = "NULL";
}
if ($numeroCasa == ""){
    $numeroCasa = "NULL";
}
if ($piso == ""){
    $piso = "NULL";
}


if (strlen($barrio) < 3) {
    header("location: modificar_domicilio.php?id_persona=$idPersona&error=barrio&id_domicilio=$id_domicilio");
    exit;
}

if (strlen($calle) < 3) {
    header("location: modificar_domicilio.php?id_persona=$idPersona&error=calle&id_domicilio=$id_domicilio");
    exit;

}
if ($altura == "NULL") {
    if (ctype_digit($altura) == false || strlen($altura) < 1) {
        header("location: modificar_domicilio.php?id_persona=$idPersona&error=altura&id_domicilio=$id_domicilio");
        exit;
    }
}
if (strlen($manzana) != 0) {
    if (strlen($manzana) < 1) {
        header("location: modificar_domicilio.php?id_persona=$idPersona&error=manzana&id_domicilio=$id_domicilio");
        exit;
    }
}
if ($numeroCasa != "NULL") {
    if (ctype_digit($numeroCasa) == false) {
        header("location: modificar_domicilio.php?id_persona=$idPersona&error=numeroCasa&id_domicilio=$id_domicilio");
        exit;
    }
}
if (strlen($torre) != 0) {
    if (ctype_alnum($torre) == false) {
        header("location: modificar_domicilio.php?id_persona=$idPersona&error=torre&id_domicilio=$id_domicilio");
        exit;
    }
}
if ($piso != "NULL") {
    if (ctype_digit($piso) == false) {
        header("location: modificar_domicilio.php?id_persona=$idPersona&error=piso&id_domicilio=$id_domicilio");
        exit;
    }
}


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
