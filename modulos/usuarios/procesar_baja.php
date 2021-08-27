<?php
require_once "../../menu.php";
require_once "../../class/Usuario.php";

$id_usuario = $_GET['id_usuario'];



$usuario = new Usuario();
$baja = $usuario->darBaja($id_usuario);
header("location: listado_usuarios.php")
?>
