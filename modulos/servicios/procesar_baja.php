<?php
require_once "../../menu.php";
require_once "../../class/Servicio.php";

$id_servicio = $_GET['id_servicio'];



//$servicio = Servicio::darBaja($id_servicio);

$servicio = new Servicio();
$baja = $servicio->darBaja($id_servicio);
header("location: listado_servicios.php")
?>
