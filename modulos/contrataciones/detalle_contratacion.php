<?php
require_once "../../class/Contratacion.php";
require_once "../../class/UsuarioServicio.php";

require_once "../../menuSub.php";

$idContratacion = $_GET['idContratacion'];
$contratacion = Contratacion::obtenerPorId($idContratacion);
$idUsuarioServicio =  $contratacion->getIdUsuarioServicio();
$usuarioServicio = UsuarioServicio::obtenerPorId($idUsuarioServicio);
$idProfesional = $usuarioServicio->getIdUsuario();
$profesional = Usuario::obtenerPorId($idProfesional);
$fechaHora = $contratacion->getFechaHora();2
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="../../css/jquery.modal.min.css">
</head>
<body>
	<h3>Contratacion nro: <?php echo $contratacion->getIdContratacion()?></h3>
	<div class="containAll">
		<div class="tabla">
			<table id="miTabla" class="display">
				<thead>
					<tr>
						<th>Cliente</th>
						<th>Profesional</th>
						<th>Servicio</th>
						<th>Costo</th>
						<th>Observaciones</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
					
					<tr>
						<td><?php echo $contratacion->usuario->getNombre().", ".$contratacion->usuario->getApellido();  ?></td>
						<td><?php echo $profesional->getNombre().", ".$profesional->getApellido();  ?></td>
						<td><?php echo $usuarioServicio->servicio->getNombre(); ?></td>
						<td><?php echo $contratacion->getCosto(); ?></td>
						<td><?php echo $contratacion->getObservaciones(); ?></td>
						<td><?php echo date("d-m-Y",strtotime($fechaHora)); ?></td>
						<td><?php echo date("H:i",strtotime($fechaHora)); ?></td>
						<td><?php echo $contratacion->estado->getDescripcion(); ?></td>
						<td>
							<a class="accion1" href="modificar_usuario.php?id_usuario=<?php echo $idContratacion; ?>">Modificar</a>
							<a id="botonCancelar" href="#ex1" rel="modal:open">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal jQuery -->
	<div id="ex1" class="modal">
	  <p>¿Está seguro de que desea eliminar este registro?</p>
	  <a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	  <a class="boton" id="aceptar" href="procesar_baja.php?id_usuario=<?php echo $idContratacion; ?>">Aceptar</a>
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>


</body>
</html>





