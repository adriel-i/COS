<?php

require_once "../../configs.php";
require_once "../../class/Usuario.php";

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

$usuario = Usuario::login($username, $password);

if ($usuario->estaLogueado()) {
	session_start();

	$_SESSION['usuario'] = $usuario;

	header("location: ../../inicio.php");

} else {

	header("location: ../../form_login.php?error=" . ERROR_LOGIN_CODE);
}

?>
