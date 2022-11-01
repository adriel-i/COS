<?php
	require_once "../../menuSub.php";
	require_once "../../class/Contratacion.php";
	require_once "../../class/Servicio.php";
	require_once "../../class/Categoria.php";
	require_once "../../class/Subcategoria.php";

	$listadoCategorias = Categoria::obtenerTodos();
	$listadoSubcategorias = Subcategoria::obtenerTodos();
	$listadoServicios = Servicio::obtenerTodos();

	$listadoUsuarios = Usuario::obtenerProfesionales();


	if (isset($_GET['txtFechaDesde']) and isset($_GET['txtFechaHasta']) and isset($_GET['cboServicio'])) {
		
		$servicio = $_GET['cboServicio'];
		$desde = $_GET['txtFechaDesde'];
		$hasta = $_GET['txtFechaHasta'];
		$listadoUsuarios = Usuario::obtenerProfesionalMasContratadoPorServicioYFecha($servicio, $desde, $hasta);
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
	<script src="../../js/cargaCategorias.js"></script>
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
		select {
			width: 150px;
			padding: 0.8%; 
			margin-bottom:2%; 
			border-radius: 5px;
		}

		form {
			text-align: center;
		}

		form label {
			display: inline-block;
			width: 100px;
			text-align: left;
		}
		label.date {
			margin-left: 2%;
			width: auto;
		}
		input.date {
			padding: 0.8%; 
			margin-bottom:2%; 
			border-radius: 5px;
		}
		#botonNaranja {
			margin-bottom: 3%;
			text-decoration: none;
		}

	</style>
</head>
<body>
	<h3>Reporte de profesionales<br>mas contratados por servicio y fecha:</h3>
		<!-- REPORTE POR SERVICIO Y FECHA DESDE / HASTA -->
		<div class="containAll">
			<div class="tabla">
				<h3>Reporte por servicio y fecha:</h3>
				<form method="GET">
					<label for="cboCategoria">Categoria:</label>
					<select name="cboCategoria" onchange="cargarSubcategorias();" id="cboCategoria" required>
					    <option value="">---Seleccionar---</option>

					    <?php foreach ($listadoCategorias as $categoria): ?>

						    <option value="<?php echo $categoria->getIdCategoria(); ?>">
						    		<?php echo $categoria->getNombre(); ?>
						    </option>

					    <?php endforeach ?>
					</select>
					<br>

					<label for="cboSubcategoria">Subcategoria:</label>
					<select name="cboSubcategoria" id="cboSubcategoria" onchange="cargarServicios()" required>
					    <option value="">---Seleccionar---</option>

					</select>
					<br>

					<label for="cboServicio">Servicio:</label>
					<select name="cboServicio" id="cboServicio" required>
					    <option value="">---Seleccionar---</option>
					    <option value="0">Todos</option>
					</select>
					<br>

					<label class="date" for="FechaDesde">Desde:</label>
					<input type="date" name="txtFechaDesde" required>

					<label class="date" for="FechaHasta">Hasta:</label>
					<input type="date" name="txtFechaHasta" required>
					<br><br>
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
