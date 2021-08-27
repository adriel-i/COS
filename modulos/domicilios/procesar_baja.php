<?php
require_once "../../menu.php";
require_once "../../class/Domicilio.php";

$idPersona = $_GET["id_persona"];
$idDomicilio = $_GET["id_domicilio"];

$domicilio = new Domicilio();
$baja = $domicilio->darBaja($idDomicilio);

header("location: listado_domicilios.php?id_persona=" . $idPersona);


?>
