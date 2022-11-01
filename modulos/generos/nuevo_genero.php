
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_genero.php">

		<h3>Agregue un nuevo genero:</h3>
		
		Descripcion: <input type="text" name="txtDescripcion">
		<br><br>
		
		<input type="submit" name="Guardar">
		
	</form>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>