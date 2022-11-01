

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_categoria.php">

		<h3>Agregue una nueva categoria:</h3>
		
		Nombre: <input type="text" name="txtNombre">
		<br><br>

		<br><br>

		<input type="submit" name="Guardar">
	</form>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>