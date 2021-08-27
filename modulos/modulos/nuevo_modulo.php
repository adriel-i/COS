<?php

require_once "../../class/Perfil.php";

$listadoPerfiles = Perfil::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_modulo.php">

		<h3>Agregue un nuevo modulo:</h3>
		
		Descripcion: <input type="text" name="txtDescripcion">
		<br><br>

		<br><br>

		<input type="submit" name="Guardar">
		
	</form>

</body>
</html>