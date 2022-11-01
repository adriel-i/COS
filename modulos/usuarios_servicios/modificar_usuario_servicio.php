<?php

require_once "../../class/UsuarioServicio.php";

$id_usuario_servicio = $_GET['id_usuario_servicio'];

$usuarioServicio = UsuarioServicio::obtenerPorId($id_usuario_servicio);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleForm.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
</head>
<body>
	
	<?php require_once "../../menuSub.php"; ?>
	<div class="containAll">
		<form method="POST" action="procesar_modificacion.php">
		<div class="tabla">
			
				<h3 class="defasado">Modifique el costo del servicio:</h3>
				<br>

				<label for="varUsuarioServicio"></label>
				<input type="hidden" name="txtIdUsuarioServicio" id="varUsuarioServicio" value="<?php echo $id_usuario_servicio; ?>">
				<br>

				<label class="sinMargen" for="varValor">Valor:</label>
				<input type="text" name="numValor" id="varValor" value="<?php echo $usuarioServicio->getValor(); ?>">
				<br>

				<button style="float:right;" id="botonNaranja" type="submit" name="Guardar">Actualizar</button>


			
		</div>
		</form>
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>

