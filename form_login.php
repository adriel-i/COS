<?php

require_once "configs.php";

$mensaje = "";
	// SI LA VARIABLE ERROR EXISTE (ISSET ES SI EXISTE) SIGUE EL PROCESO
if (isset($_GET['error'])) {
	$error = $_GET['error'];

	if ($error == ERROR_LOGIN_CODE) {

		$mensaje = ERROR_LOGIN_MENSAJE;
		// SI EL ERROR ES = AL CODIGO DE ERROR DE MENSAJE
	} else if ($error == MENSAJE_CODE) {

		$mensaje = MENSAJE_NECESITA_LOGIN;	
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="imagenes/Marca/Marca2.png">
	<link rel="stylesheet" type="text/css" href="css/styleLogin.css">
	<title></title>
	<style type="text/css">
		
		body, html {
    height: 100%;
    background-repeat: no-repeat;
    background: url(imagenes/Fondos/fondo2.jpg) no-repeat center center fixed;
    background-size: 100% 100%;
}
	</style>
</head>
<body>

	<header>
		<img src="imagenes/Marca/Marca1.png" alt="Marca COS" width="200">
	</header>
	<h3 id="mensajeError"><?php echo $mensaje; ?></h3>
	<div class="contenedor">
		
		<div class="formLogin">
			<img class="login" src="imagenes/loginCian.png">
			<form method="POST" action="modulos/usuarios/procesar_login.php">
				<label for="username"></label>
				<input type="text" id="username" name="txtUsername" placeholder="Usuario">
				<br><br>
				<label for="password"></label>
				<input type="password" id="password" name="txtPassword" placeholder="Contraseña">
				<br><br><br>
				<button type="submit" id="submit">Iniciar Sesion</button>
			</form>
		</div>
		<div class="links">
			<a href="#">¿Olvidaste tu <br> contraseña?</a>
			<a id="registrar" href="modulos/usuarios/form_nuevo_usuario.php">Registrarse</a>
		</div>
	</div>
</body>
</html>