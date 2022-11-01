<?php
require_once "../../class/Contratacion.php";
require_once "../../class/UsuarioServicio.php";
require_once "../../class/Domicilio.php";

$idUsuario = $_POST['txtIdUsuario'];
$idServicio = $_POST['cboServicio'];
$usuarioServicio = $_POST['txtIdUsuarioServicio'];

$profesional = UsuarioServicio::obtenerPorId($usuarioServicio);
$cliente = Usuario::obtenerPorId($idUsuario);
$idPersona = $cliente->getIdPersona();
$listadoDomicilios = Domicilio::obtenerPorIdPersona($idPersona);

$valor = $profesional->getValor();
$usuarioServicio = $profesional->getIdUsuarioServicio();


$contratacion = Contratacion::obtenerUltimoPorIdUsuario($idUsuario);
$fechaHora = $contratacion->getFechaHora();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		label { vertical-align: top;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../../css/styleTabla.css">
	<link rel="stylesheet" type="text/css" href="../../css/styleMenu.css">
	<link rel="stylesheet" type="text/css" href="../../css/styleForm.css">
</head>
<body>
	<?php require_once "../../menuSub.php"; ?>
	<div class="containAll">
		<div class="tabla">
			<div class="tablaVertical">
	
				<table>
					<h3>Detalle de la contratacion:</h3>
					
					<tr>
						<th>Cliente</th>
						<td><?php echo $cliente->getNombre() ." ". $cliente->getApellido(); ?></td>
					</tr>
					<tr>
						<th>Profesional Contratado</th>
						<td><?php echo $profesional->usuario->getNombre() ." ". $profesional->usuario->getApellido(); ?></td>
					</tr>
					<tr>
						<th>Servicio Contratado</th>
						<td><?php echo $profesional->servicio->getNombre() ?></td>
					</tr>
					<tr>
						<th>Valor de servicio</th>
						<td>$<?php echo $profesional->getValor(); ?></td>
					</tr>
					<?php foreach  ($listadoDomicilios as $domicilio): ?>
					<tr>
						<th>Direccion</th>
						<td><?php echo $domicilio->getBarrio() .", ". $domicilio->getCalle() ." ". $domicilio->getAltura() ." ". $domicilio->getManzana() ." ". $domicilio->getNumeroCasa() ." ". $domicilio->getTorre() ." ". $domicilio->getPiso() ;?></td>
					</tr>
					<?php endforeach ?>
					<tr>
						<th>Fecha</th>
						<td><?php echo date("d-m-Y",strtotime($fechaHora)); ?></td>
					</tr>
					<tr>
						<th>Hora</th>
						<td><?php echo date("H:i",strtotime($fechaHora)); ?></td>
					</tr>
					<tr>
						<th>Observaciones</th>
						<td><?php echo $contratacion->getObservaciones(); ?></td>
					</tr>
					<tr>
						<th>Estado</th>
						<td><?php echo $contratacion->estado->getDescripcion(); ?></td>
					</tr> 
					<tfoot>
					</tfoot>
				</table>
				<a id="volverInicio" href="../../inicio.php">Volver al inicio</a>
			</div>
		</div>
	</div>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>	
</body>

</html>
