
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_tipo_factura.php">

		<h3>Agregue un nuevo tipo de factura:</h3>
		
		Descripcion: <input type="text" name="txtDescripcion">
		<br><br>
		
		<input type="submit" name="Guardar">
		
	</form>

</body>
</html>