<?php

require_once "../../class/Contacto.php";


$idPersona = $_POST["txtIdPersona"];
$idTipoContacto = $_POST["cboTipoContacto"];
$valor = trim($_POST["txtValor"]);


if ($idTipoContacto == 0) {
    header("location: listado_contactos.php?id_persona=$idPersona&error=tipoContacto");
    exit;
}
if ($idTipoContacto == 2) {
    if (strlen($valor) != 7 || ctype_digit($valor) == false) {
        header("location: listado_contactos.php?id_persona=$idPersona&error=valor");
        exit;
    }     
}
if ($idTipoContacto == 1) {
    if (strlen($valor) != 10 || ctype_digit($valor) == false) {
        header("location: listado_contactos.php?id_persona=$idPersona&error=valor");
        exit;
    }     
}
if ($idTipoContacto == 3) {
    if (strlen($valor) < 11) {
        header("location: listado_contactos.php?id_persona=$idPersona&error=valor");
        exit;
    }     
}

$contacto = new Contacto();

$contacto->setIdPersona($idPersona);
$contacto->setIdTipoContacto($idTipoContacto);
$contacto->setValor($valor);

$contacto->guardar();


header("location: listado_contactos.php?id_persona=" . $idPersona);




?>