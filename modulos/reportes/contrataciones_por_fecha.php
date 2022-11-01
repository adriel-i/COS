<?php
	require_once "../../menuSub.php";
	require_once "../../class/Contratacion.php";
	require_once "../../class/Servicio.php";


	$contratacionFecha = Contratacion::obtenerTodos();

	// REPORTE FECHA DESDE / HASTA
	if (isset($_GET['txtFechaDesde']) and isset($_GET['txtFechaHasta'])) {
		
		$desde = $_GET['txtFechaDesde'];
		$hasta = $_GET['txtFechaHasta'];
		$contratacionFecha = Contratacion::obtenerPorFecha($desde, $hasta);
	}
	
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
				ordering: false,
				paging: true,
				bInfo : false,
			});
		});

	</script>

	<style type="text/css">
		input.date {
			padding: 0.8%; 
			margin-bottom:2%; 
			border-radius: 5px;
		}

		form {
			text-align: center;
		}
		label.date {
			margin-left: 2%;
		}
		#botonNaranja {
			margin-bottom: 3%;
			text-decoration: none;
		}


	</style>
</head>
<body>
	<h3>Reporte de contrataciones por fecha:</h3>
		<!-- REPORTE DE CONTRATACIONES POR FECHA DESDE / HASTA -->
	<div class="containAll">
			<div class="tabla">
				<h3>Contrataciones por fecha:</h3>
				<form method="GET">
					<label class="date" for="FechaDesde">Desde:</label>
					 <input class="date" type="date" name="txtFechaDesde" id="FechaDesde">

					<label class="date" for="FechaHasta">Hasta:</label>
					 <input class="date" type="date" name="txtFechaHasta" id="FechaHasta">

					<br>
					<button class="buscar" type="submit">Consultar</button>
				</form>
				<table id="miTabla" class="display">
					<thead>
						<tr>
							<th>ID</th>
							<th>Cliente</th>
							<th>Profesional</th>
							<th>Servicio</th>
							<th>Costo</th>
							<th>Acciones</th>

						</tr>
					</thead>

						<?php foreach  ($contratacionFecha as $contratacionDesdeHasta):

						$idContratacion = $contratacionDesdeHasta->getIdContratacion();
						$idUsuarioServicio = $contratacionDesdeHasta->getIdUsuarioServicio();
						$usuarioServicio = UsuarioServicio::obtenerPorId($idUsuarioServicio);
						$servicio = $usuarioServicio->servicio->getNombre();
						$idProfesional = $usuarioServicio->getIdUsuario();
						$profesional = Usuario::obtenerPorId($idProfesional);

					?>
					<tbody>
						<tr>
							
							<td><?php echo $contratacionDesdeHasta->getIdContratacion(); ?></td>
							<td><?php echo $contratacionDesdeHasta->usuario->getNombre().",".$contratacionDesdeHasta->usuario->getApellido(); ?></td>
							<td><?php echo $profesional->getNombre().",".$profesional->getApellido(); ?></td>
							<td><?php echo $servicio; ?></td>
							<td><?php echo $contratacionDesdeHasta->getCosto(); ?></td>

							<td>
								<a class="accion1" href="../contrataciones/detalle_contratacion.php?idContratacion=<?php echo $idContratacion;?>">Detalles</a>
							</td>

						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<div class="contenedor">
					<a id="botonNaranja" href="listado_reportes_contrataciones.php">VOLVER A REPORTES</a>
				</div>
			</div> 
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>
