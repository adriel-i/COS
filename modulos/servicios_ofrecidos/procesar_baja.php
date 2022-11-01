<?php 

require_once "../../class/UsuarioServicio.php";

$idUsuarioServicio = $_GET['id_usuario_servicio'];
$idUsuario = $_GET['id_usuario'];

$usuarioServicio = new UsuarioServicio();
$baja = $usuarioServicio->darBaja($idUsuarioServicio);

header("location: listado_servicios_ofrecidos.php?id_usuario=$idUsuario")


?>