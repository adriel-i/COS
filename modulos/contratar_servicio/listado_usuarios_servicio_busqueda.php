<?php

require_once "../../class/UsuarioServicio.php";
require_once "../../class/UsuarioCalificado.php";
require_once "../../class/Calificacion.php";

if (isset($_POST['cboServicio'])) {
	$servicio = $_POST['cboServicio'];
	$listadoProfesionales = UsuarioServicio::obtenerPorIdServicio($servicio);
}
if (isset($_POST['serviSearch'])) {
	$servicio = $_POST['serviSearch'];
	$listadoProfesionales = UsuarioServicio::obtenerPorNombreServicio($servicio);
}
// $idServicio = $_POST['cboServicio'];
$id_usuario = $_POST['txtIdUsuario'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/styleMenu.css">
	<link rel="stylesheet" type="text/css" href="../../css/styleTabla.css">
	<script type="text/javascript" src="../../js/jquery.3.6.js"></script>
</head>
<body>
	<?php require_once "../../menuSub.php"; ?>
	<form method="POST" action="contratar.php">
		<h3>Seleccione un profesional:</h3>
		<div class="containAll">
			<?php  
				foreach ($listadoProfesionales as $profesional) {
				$ano = date("Y");
				$fechaNacimiento = $profesional->usuario->getFechaNacimiento();
				$edad = intval($ano) - intval($fechaNacimiento);
				$idUsuarioProfesional = $profesional->usuario->getIdUsuario();
				$idUsuarioServicio = $profesional->getIdUsuarioServicio();
				$idServicio = $profesional->getIdServicio();

				$listadoCalificaciones = Calificacion::obtenerPromedio($idUsuarioProfesional);

				foreach ($listadoCalificaciones as $calificacion) {

					if($calificacion == true) {
						$valor = $calificacion->getValor();
					}
					else if ($calificacion == false) {
						$valor = 0;
					}
			?>
			
			<div class="tablaVertical">
				<div class="tabla">
					<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">
					<input type="hidden" name="cboServicio" value="<?php echo $idServicio; ?>">
					<table>
						<caption><?php echo $profesional->usuario->getUsername(); ?></caption>
						<tr>
							<th>Nombre</th>
							<td><?php echo $profesional->usuario->getNombre() ." ". $profesional->usuario->getApellido(); ?></td>
						</tr>
						<tr>
							<th>Edad</th>
							<td><?php echo $edad; ?></td>
						</tr>
						<tr class="estrellita">
							<th>Reputacion</th>
							<td id="<?php echo $idUsuarioProfesional; ?>">
								<div id="star-rating">
								    <li id="star1_<?php echo $idUsuarioServicio; ?>">&#x2605;</li>
								    <li id="star2_<?php echo $idUsuarioServicio; ?>">&#x2605;</li>
								    <li id="star3_<?php echo $idUsuarioServicio; ?>">&#x2605;</li>
								    <li id="star4_<?php echo $idUsuarioServicio; ?>">&#x2605;</li>
								    <li id="star5_<?php echo $idUsuarioServicio; ?>">&#x2605;</li>
								</div>

								<input type="hidden" name="valor" id="<?php echo $idUsuarioServicio; ?>" 
								value="<?php echo $calificacion->getValor(); ?>">	
							</td>
						</tr>
						<tr>
							<th>Servicio</th>
							<td><?php echo $profesional->servicio->getNombre() ?></td>
						</tr>
						<tr>
							<th>Valor</th>
							<td>$<?php echo $profesional->getValor(); ?></td>
						</tr>
						<tfoot>
							<tr>
								<td colspan="4"><a id="botonNaranja" href="contratar.php?idUsuarioServicio=<?php echo $idUsuarioServicio;?>
								&txtIdUsuario=<?php echo $id_usuario; ?>&cboServicio=<?php echo $idServicio; ?>">Seleccionar</a></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<script type="text/javascript" defer>

					td = $("#<?php echo $idUsuarioProfesional; ?>");

						var valor = $("#<?php echo $idUsuarioServicio; ?>").val();
						var li = $("#star"+valor+"_"+<?php echo $idUsuarioServicio; ?>);
						
						li.css({"color": "orange"});
						li.prevAll().css({"color": "orange"});

			</script>
			<?php
				}
			};
			?>
		</div>
	</form>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>


	
</body>
</html>

