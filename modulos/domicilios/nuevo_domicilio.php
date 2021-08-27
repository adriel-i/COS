<?php

require_once "../../class/Domicilio.php";

$idPersona = $_GET['id_persona'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

<h3>Complete los datos de domicilio:</h3>

	<form method="POST" action="procesar_domicilio.php?id_persona=<?php echo $idPersona; ?>">
		
		Barrio: <input type="text" name="txtBarrio">
		<br><br>

		Calle: <input type="text" name="txtCalle">
		<br><br>

		Altura: <input type="number" name="numAltura">
		<br><br>

		Manzana: <input type="text" name="txtManzana">
		<br><br>

		Numero de casa: <input type="number" name="numNroCasa">
		<br><br>

		Torre: <input type="text" name="txtTorre">
		<br><br>

		Piso: <input type="number" name="numPiso">
		<br><br>

		Observaciones: <input type="text" name="txtObservaciones">
		<br><br>

		<input type="submit" name="Guardar">


	</form>

</body>
</html>