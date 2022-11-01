<?php

require_once "../../class/Contratacion.php";
require_once "../../class/Usuario.php";
require_once "../../class/Domicilio.php";


$idContratacion = $_GET['idContratacion'];
$contratacion = Contratacion::obtenerPorId($idContratacion);
$idUsuario = $contratacion->getIdUsuario();
$cliente = Usuario::obtenerPorId($idUsuario);
$idPersona = $cliente->getIdPersona();
$listadoDomicilios = Domicilio::obtenerPorIdPersona($idPersona);

$idUsuarioServicio = $contratacion->getIdUsuarioServicio();
$usuarioServicio = UsuarioServicio::obtenerPorId($idUsuarioServicio);
$servicio = $usuarioServicio->servicio->getNombre();
$fechaHora = $contratacion->getFechaHora();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/contrataciones/funciones.js"></script>

	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="../../css/jquery.modal.min.css">
</head>
<body>
	<?php require_once "../../menuSub.php"; ?>
	<h3>Detalle de la contratacion</h3>
	<div class="containAll">
		<div class="tablaVertical">
			<div class="tabla">
				<h3>Contratacion N°<?php echo $contratacion->getIdContratacion(); ?></h3>
				<table class="verticalTable">

					<tr>
						<th>ID Contratacion</th>
						<td><?php echo $contratacion->getIdContratacion(); ?></td>
					</tr>
					<tr>
						<th>Cliente</th>
						<td><?php echo $contratacion->usuario->getApellido().", ".$contratacion->usuario->getNombre();?></td>
					</tr>
					<tr>
						<th>Servicio Solicitado</th>
						<td><?php echo $servicio ?></td>
					</tr>
					<tr>
						<th>Costo</th>
						<td>$<?php echo $contratacion->getCosto(); ?></td>
					</tr>

					<tr>
						<th>Fecha</th>
						<td><?php echo date("d-m-Y",strtotime($fechaHora)); ?></td>
					</tr>
					<tr>
						<th>Hora</th>
						<td><?php echo date("H:i",strtotime($fechaHora)); ?></td>
					</tr>
					<?php foreach  ($listadoDomicilios as $domicilio): ?>
						<tr>
							<th>Domicilio</th>
							<td><?php echo $domicilio->getBarrio() .", ". $domicilio->getCalle() ." ". $domicilio->getAltura() ." ". $domicilio->getManzana() ." ". $domicilio->getNumeroCasa() ." ". $domicilio->getTorre() ." ". $domicilio->getPiso() ;?></td>
						</tr>
						<tr>
							<th>Observaciones del domicilio</th>
							<td><?php echo $domicilio->getObservaciones() ;?></td>
						</tr>
					<?php endforeach ?>
					<tr>
						<th>Observaciones del servicio requerido</th>
						<td><?php echo $contratacion->getObservaciones(); ?></td>
					</tr>
					<tr>
						<th>Estado</th>
						<td id="estado"><?php echo $contratacion->estado->getDescripcion(); ?></td>
					</tr>
					<tr>
						<th>Acciones</th>
						<td id="acciones">
							<a class="botonTabla" id="botonAceptar" href="procesar_estado.php?idContratacion=<?php echo $contratacion->getIdContratacion(); ?>&idEstado=1">Aceptar</a>
							<a class="botonTabla" id="botonPostergar" href="procesar_estado.php?idContratacion=<?php echo $contratacion->getIdContratacion(); ?>&idEstado=5">Postergar</a>
							<a class="botonTabla" id="botonCancelar" href="#ex1" rel="modal:open">Rechazar</a>
							<a id="botonFinalizar" class="botonTabla" href="procesar_estado.php?idContratacion=<?php echo $contratacion->getIdContratacion(); ?>&idEstado=4">Finalizar</a>
						</td>
					</tr>
					<tfoot>
						<tr>
							<td colspan="2"><a id="botonTicket" class="colspan" href="ticket_contrato.php?idContratacion=<?php echo $idContratacion;?>">Generar Ticket</a></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<!-- Modal jQuery -->
	<div id="ex1" class="modal">
	  <p>¿Está seguro de que desea rechazar esta contratacion?</p>
	  <a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	  <a class="boton" id="aceptar" href="procesar_estado.php?idContratacion=<?php echo $contratacion->getIdContratacion(); ?>&idEstado=3">Aceptar</a>
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>

