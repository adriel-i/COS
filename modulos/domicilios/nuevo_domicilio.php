<?php

require_once "../../class/Domicilio.php";

// CONTROL DE ERROR

$mensaje ="";

if (isset($_GET["error"])) {
	switch($_GET["error"]) {
		case "barrio":
			$mensaje = "VALOR INVALIDO: el barrio debe contener minimo 3 caracteres alfanumericos";
            break;
        case "calle":
            $mensaje = "VALOR INVALIDO: la calle debe contener minimo 3 caracteres alfanumericose";
            break;
        case "altura":
            $mensaje = "VALOR INVALIDO: la altura debe contener minimo 1 caracter numerico";
            break;
        case "manzana":
            $mensaje = "VALOR INVALIDO: la manzana debe contener minimo 1 caracter alfanumerico";
            break;
        case "numeroCasa":
            $mensaje = "VALOR INVALIDO: el numero de casa debe contener minimo 1 caracter numerico";
            break;
        case "torre":
            $mensaje = "VALOR INVALIDO: la torre debe contener minimo 1 caracter alfanumerico";
            break;
        case "piso":
            $mensaje = "VALOR INVALIDO: el piso debe contener minimo 1 caracter numerico";
            break;
	}
}

$idPersona = $_GET['id_persona'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleForm.css">
	<script src="../../js/usuarios/funciones.js"></script>

</head>
<body>
	
<?php require_once "../../menuSub.php"; ?>


	<?php echo $mensaje;?>
	<div class="contenedor">
		<div class="form" id="divMensaje">
			<h3>Complete los datos de domicilio:</h3>
			<form method="POST" action="procesar_domicilio.php?id_persona=<?php echo $idPersona; ?>">
				<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varBarrio">Barrio:</label>
				<input type="text" name="txtBarrio" id="varBarrio" required>
				<br><br>

				<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varCalle">Calle:</label>
				<input type="text" name="txtCalle" id="varCalle" required>
				<br><br>

				<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varAltura">Altura:</label>
				<input type="number" name="numAltura" id="varAltura" required>
				<br><br>

				<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varManzana">Manzana:</label>
				<input type="text" name="txtManzana" id="varManzana">
				<br><br>

				<div class="rightDomicilio">
					<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varNroCasa">Nro. de casa:</label>
					<input type="number" name="numNroCasa" id="varNroCasa">
					<br><br>

					<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varTorre">Torre:</label>
					<input type="text" name="txtTorre" id="varTorre">
					<br><br>

					<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varPiso">Piso:</label>
					<input type="number" name="numPiso" id="varPiso">
					<br><br>

					<img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varObservaciones">Observaciones:</label>
					<input type="text" name="txtObservaciones" id="varObservaciones">
					<br><br>

					<button type="submit" onclick="return validarDomicilio();"><img class="mas" src="../../imagenes/Icons/mas.png">Agregar</button>
				</div>
			</form>
		</div>
	</div>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

	

</body>
</html>