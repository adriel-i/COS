<?php
	// error_reporting(0);
	require_once "../../menuSub.php";
	require_once "../../class/Usuario.php";


	$listadoUsuarios = Usuario::obtenerProfesionales();

	// REPORTE POR Subcategoria

	if (isset($_GET['txtFechaDesde']) and isset($_GET['txtFechaHasta'])) {
		
		$desde = $_GET['txtFechaDesde'];
		$hasta = $_GET['txtFechaHasta'];
		$listadoUsuarios = Usuario::obtenerProfesionalMasContratadoPorFecha($desde, $hasta);
	}


// $cantidadContratos = Usuario::obtenerCantidadContratosDeProfesionales();
						
// foreach ($cantidadContratos as $contrato) {
// 	$cantidad = $contrato['cantidad_contratos'];
// 		echo($cantidad);
// }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<source src="../../imagenes/Marca/Marca1.png">
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
	<h3>Reporte de profesional<br>mas contratado por fecha:</h3>
	<div class="containAll">

		<!-- REPORTE POR SERVICIO -->
		<div  class="tabla">
			<h3>Reporte por fecha:</h3>
			<form method="GET">
				<label for="FechaDesde">Desde:</label>
				 <input class="date" type="date" name="txtFechaDesde" id="FechaDesde" required>

				<!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
				<label for="FechaHasta">Hasta:</label>
				 <input class="date" type="date" name="txtFechaHasta" id="FechaHasta" required>

				<!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
				<br>
				<button class="buscar" type="submit">Consultar</button>
			</form>
			<table id="miTabla" class="display" >
				<thead>
					<tr>
						<th>ID Usuario</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>DNI</th>
						<th>Perfil</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach  ($listadoUsuarios as $usuario): 
						?>
					<tr>
						<td><?php echo $usuario->getIdUsuario(); ?></td>
						<td><?php echo $usuario->getNombre(); ?></td>
						<td><?php echo $usuario->getApellido(); ?></td>
						<td><?php echo $usuario->getDni(); ?></td>
						<td><?php echo $usuario->perfil->getDescripcion(); ?></td>
						<td>
							<a class="accion1" href="../usuarios/detalle_info_usuario.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>">Detalles</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<div class="contenedor">
				<a id="botonNaranja" href="listado_reportes_profesionales.php">VOLVER A REPORTES</a>
			</div>
		</div>
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>