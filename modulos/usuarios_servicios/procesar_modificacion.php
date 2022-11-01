<?php
require_once "../../menu.php";
require_once "../../class/UsuarioServicio.php";

$id_usuario_servicio = $_POST['txtIdUsuarioServicio'];
$valor = $_POST['numValor'];

$usuarioServicio = UsuarioServicio::obtenerPorId($id_usuario_servicio);

$usuarioServicio->setValor($valor);

$usuarioServicio->actualizar();

header("location: listado_usuarios_servicios.php")
?>
