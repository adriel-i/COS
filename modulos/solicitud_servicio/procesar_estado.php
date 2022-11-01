<?php

require_once "../../class/Contratacion.php";

$idContratacion = $_GET['idContratacion'];
$idEstado = $_GET['idEstado'];

$contratacion = Contratacion::obtenerPorId($idContratacion);
$contratacion->setIdEstadoContratacion($idEstado);

$contratacion->cambiarEstado($idContratacion);

if ($idEstado == 2) {
	header("location: ../usuario_contrataciones/detalle_contratacion.php?idContratacion=" . $idContratacion);
}
else {
	header("location: detalle_solicitud.php?idContratacion=" . $idContratacion);
}
?>