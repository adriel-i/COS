<?php 

require_once "../../class/UsuarioServicio.php";

$valor = $_POST['numValor'];
$idUsuarioServicio = $_GET['id_usuario_servicio'];
$idUsuario = $_GET['id_usuario'];

$usuarioServicio = new UsuarioServicio();

$usuarioServicio->setValor($valor);

$usuarioServicio->actualizar($idUsuarioServicio);

header("location: listado_servicios_ofrecidos.php?id_usuario=$idUsuario");




?>