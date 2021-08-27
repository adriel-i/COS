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
	<title></title>
</head>
<body>

	<h3><?php echo $mensaje; ?></h3>

	<br>
	<br>
	<!-- POST: ENVIA LOS DATOS POR DETRAS -->
	<form method="POST" action="modulos/usuarios/procesar_login.php">
		<!-- CAJAS DE TEXTO -->
		Usuername: <input type="text" name="txtUsername">
		<br><br>
		Password: <input type="text" name="txtPassword">
		<br><br>
		<input type="submit" value="Iniciar sesion">
	</form>

</body>
</html>