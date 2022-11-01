<?php
require_once "../../menu.php";
require_once "../../class/UsuarioServicio.php";

$id_usuario_servicio = $_GET['id_usuario_servicio'];

$usuarioServicio = new UsuarioServicio();
$baja = $usuarioServicio->darBaja($id_usuario_servicio);
header("location: listado_usuarios_servicios.php")
?>
