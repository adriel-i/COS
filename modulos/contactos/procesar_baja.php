<?php
require_once "../../menu.php";
require_once "../../class/Contacto.php";


$idPersona = $_GET["id_persona"];
$idPersonaTipoContacto = $_GET["idPersonaTipoContacto"];


$contacto = new Contacto();
$baja = $contacto->darBaja($idPersonaTipoContacto);


header("location: listado_contactos.php?id_persona=" . $idPersona);


?>
