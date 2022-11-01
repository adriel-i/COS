<?php

require_once "../../class/Domicilio.php";


$idPersona = $_GET["id_persona"];
$barrio = ($_POST["txtBarrio"]);
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


if (strlen($barrio) == 0) {
    header("location: nuevo_domicilio.php?id_persona=$idPersona&error=barrio");
    exit;
}
if (strlen($calle) == 0) {
    header("location: nuevo_domicilio.php?id_persona=$idPersona&error=calle");
    exit;
}
if ($altura == "NULL") {
    if (ctype_digit($altura) == false) {
        header("location: nuevo_domicilio.php?id_persona=$idPersona&error=altura");
        exit;
    }
}
if (strlen($manzana) != 0) {
    if (strlen($manzana < 1)) {
        header("location: nuevo_domicilio.php?id_persona=$idPersona&error=manzana");
        exit;
    }   
}
if ($numeroCasa != "NULL") {
    if (ctype_digit($numeroCasa) == false) {
        header("location: nuevo_domicilio.php?id_persona=$idPersona&error=numeroCasa");
        exit;
    }
}
if (strlen($torre) != 0) {
    if (strlen($torre < 1)) {
        header("location: nuevo_domicilio.php?id_persona=$idPersona&error=torre");
        exit;
    }      
}
if ($piso != "NULL") {
    if (ctype_digit($piso) == false) {
        header("location: nuevo_domicilio.php?id_persona=$idPersona&error=piso");
        exit;
    }
}


$domicilio = new Domicilio();

$domicilio->setIdPersona($idPersona);
$domicilio->setBarrio($barrio);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setManzana($manzana);
$domicilio->setNumeroCasa($numeroCasa);
$domicilio->setTorre($torre);
$domicilio->setPiso($piso);
$domicilio->setObservaciones($observaciones);

$domicilio->guardar();


header("location: listado_domicilios.php?id_persona=" . $idPersona);

?>