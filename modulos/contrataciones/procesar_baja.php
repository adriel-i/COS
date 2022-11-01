<?php

require_once "../../class/Contratacion.php";

$idContratacion = $_GET['idContratacion'];

$contratacion = new Contratacion();

$baja = $contratacion->darBaja($idContratacion);

header("location: listado_contrataciones.php")


?>