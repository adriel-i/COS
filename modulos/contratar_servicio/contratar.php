<?php

require_once "../../class/UsuarioServicio.php";
require_once "../../class/Domicilio.php";

$idServicio = $_GET['cboServicio'];
$id_usuario = $_GET['txtIdUsuario'];
$idUsuarioServicio = $_GET['idUsuarioServicio'];

$profesional = UsuarioServicio::obtenerPorId($idUsuarioServicio);
$cliente = Usuario::obtenerPorId($id_usuario);
$idPersona = $cliente->getIdPersona();
$listadoDomicilios = Domicilio::obtenerPorIdPersona($idPersona);
$valor = $profesional->getValor();
$usuarioServicio = $profesional->getIdUsuarioServicio();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<link rel="stylesheet" href="../../css/styleForm.css">
	<script type="text/javascript" src="../../js/jquery.3.6.js"></script>
	<script type="text/javascript" src="../../js/contrataciones/funciones.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="../../css/styleContratacion.css"> -->
</head>
<body>
	<?php require_once "../../menuSub.php"; ?>
	<div class="contenedor">
		<form method="POST" action="procesar_contratacion.php">
			<div class="tabla">
				<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">
				<input type="hidden" name="cboServicio" value="<?php echo $idServicio; ?>">
				<input type="hidden" name="intValor" value="<?php echo $valor; ?>">
				<input type="hidden" name="txtIdUsuarioServicio" value="<?php echo $idUsuarioServicio; ?>">

				<div class="tablaVertical">
					<table>
						<h3>Resumen de la contratacion:</h3>
						<tr>
							<th>Cliente</th>
							<td><?php echo $cliente->getNombre() ." ". $cliente->getApellido(); ?></td>
						</tr>
						<?php foreach  ($listadoDomicilios as $domicilio): ?>
						<tr>
							<th>Direccion</th>
							<td><?php echo $domicilio->getBarrio() ." ". $domicilio->getCalle() ." ". $domicilio->getAltura() ." ". $domicilio->getManzana() ." ". $domicilio->getNumeroCasa() ." ". $domicilio->getTorre() ." ". $domicilio->getPiso() ;?></td>
						</tr>
						<?php endforeach ?>
						<tr>
							<th>domicilio (observaciones)</th>
							<td><?php echo $domicilio->getObservaciones() ;?></td>
						</tr>
						<tr>
							<th>Servicio Requerido</th>
							<td><?php echo $profesional->servicio->getNombre() ?></td>
						</tr>
						<tr>
							<th>Profesional a Contratar</th>
							<td><?php echo $profesional->usuario->getNombre() ." ". $profesional->usuario->getApellido(); ?></td>
						</tr>
						<tr>
							<th>Valor de servicio</th>
							<td>$<?php echo $profesional->getValor(); ?></td>
						</tr>
						<tfoot>
						</tfoot>
					</table>
				</div>
				<!-- <div class="centrar"> -->
					<div class="fechaHora">
						<h3 >Fecha y hora a recibir la visita:</h3>
						<br>
						<!-- <label for="varFechaHora">Fecha y hora:</label>
						<input type="datetime-local" name="dtFechaHora" id="varFechaHora">
						<br><br> -->
						<span style="margin-left: -1%;" id="mensajeFecha"></span>
						<label for="varFecha">Fecha:</label>
						<input onblur="validarFecha()" type="date" name="dtFecha" id="varFecha" required>
						<br>
						<span style="margin-left: -1%;" id="mensajeHora"></span>
						<label for="varHora">Hora:</label>
						<input onblur="validarHora()" type="time" name="tmHora" id="varHora" required>
						<br>
						<label for="varObservaciones">Observaciones:</label>
						<br><br>
						<textarea name="txtObservaciones" id="varObservaciones" rows="10" cols="40" placeholder="(Opcional)"></textarea>
						<br><br>
						<button style="margin-left: 30%; margin-bottom: 5%;" id="botonNaranja" type="submit" name="contratar">Solicitar Servicio</button>
					</div>
				<!-- </div> -->
			</div>
		</form>
	</div>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>
