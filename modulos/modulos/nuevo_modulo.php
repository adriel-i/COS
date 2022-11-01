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
		Directorio: <input type="text" name="txtDirectorio">
		<br><br>

		<input type="submit" name="Guardar">
		
	</form>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>