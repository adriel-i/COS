<?php

require_once "../../class/Contratacion.php";
require_once "../../class/UsuarioServicio.php";
$idUsuario = $_GET['id_usuario'];

$contratacion = Contratacion::obtenerSolicitudes($idUsuario);
$listadoEstados = EstadoContratacion::obtenerTodos();

	if (isset($_GET['cboEstado'])) {
		$estadoContrato = $_GET['cboEstado'];
		$contratacion = Contratacion::obtenerSolicitudesPorEstado($idUsuario, $estadoContrato);
		if ($estadoContrato == "0") {
			$contratacion = Contratacion::obtenerSolicitudes($idUsuario);
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link href="../../css/jquery.dataTables.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.dataTables.min.js"></script>
	<script defer>
		$(document).ready(function() {
			$('#miTabla').DataTable({
				searching: true,
				ordering: true,
				paging: true,
				bInfo : false,
			});
		});

	</script>
	<style type="text/css">
		

		form {
		    text-align: center;
		}

		select {
			width: 150px;
			padding: 0.8%; 
			margin-bottom:2%; 
			border-radius: 5px;
		}
form label {
			display: inline-block;
			width: 100px;
			text-align: left;
		}
	</style>
	<!-- <script src="../../js/usuarios/funciones.js"></script> -->
</head>
<body>
	<?php require_once "../../menuSub.php"; ?>

	<div class="containAll">
		<div class="tabla">

			<h3>Solicitudes de servicios:</h3>
			<div>
			<form method="GET">		
				<input type="hidden" name="id_usuario" value="<?php echo $idUsuario;?>">	
				<select name="cboEstado" onchange="submit()" id="cboEstado" required>
					    <option value="">Filtro por estado</option>
					    <option value="0">Todos</option>

					    <?php foreach ($listadoEstados as $estado): ?>

						    <option value="<?php echo $estado->getIdEstadoContratacion(); ?>">
						    		<?php echo $estado->getDescripcion(); ?>
						    </option>

					    <?php endforeach ?>
					</select>
			</form>
			</div>
			<table id="miTabla" class="display">

				<thead>
					<tr>
						<th>ID Contratacion</th>
						<th>Cliente</th>
						<th>Servicio Solicitado</th>
						<th>Costo</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<?php foreach ($contratacion as $solicitud): 

				$idUsuarioServicio = $solicitud->getIdUsuarioServicio();
				$usuarioServicio = UsuarioServicio::obtenerPorId($idUsuarioServicio);
				$servicio = $usuarioServicio->servicio->getNombre();
				$fechaHora = $solicitud->getFechaHora();
				
				?>
				<tbody>
					<tr>
						<td><?php echo $solicitud->getIdContratacion(); ?></td>
						<td><?php echo $solicitud->usuario->getApellido().", ".$solicitud->usuario->getNombre();?></td>
						<td><?php echo $servicio ;?></td>
						<td>$<?php echo $solicitud->getCosto(); ?></td>
						<td id="fecha"><?php echo date("d-m-Y",strtotime($fechaHora)); ?></td>
						<td><?php echo date("H:i",strtotime($fechaHora)); ?></td>
						<td id="estado"><?php echo $solicitud->estado->getDescripcion(); ?></td>
						<td><a class="accion1" href="detalle_solicitud.php?idContratacion=<?php echo $solicitud->getIdContratacion();?>">
						Ver detalle</a></td>
					</tr>
					<tfoot>
					</tfoot>
				</tbody>
				<?php endforeach ;?>
			</table>
		</div>
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>


</body>
</html>
