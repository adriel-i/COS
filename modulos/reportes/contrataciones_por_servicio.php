<?php
	require_once "../../menuSub.php";
	require_once "../../class/Contratacion.php";
	require_once "../../class/Servicio.php";
	require_once "../../class/Categoria.php";
	require_once "../../class/Subcategoria.php";

	$contratacion = Contratacion::obtenerTodos();
	$listadoCategorias = Categoria::obtenerTodos();
	$listadoSubcategorias = Subcategoria::obtenerTodos();
	$listadoServicios = Servicio::obtenerTodos();

	// REPORTE POR SERVICIO

	if (isset($_GET['cboServicio'])) {
		$servicio = $_GET['cboServicio'];
		$contratacion = Contratacion::obtenerPorIdServicio($servicio);
		if ($servicio == 0) {
			$contratacion = Contratacion::obtenerTodos();
		}
	}

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
		#botonNaranja {
			margin-bottom: 3%;
			text-decoration: none;
		}

	</style>
</head>
<body>
	<h3>Reporte de contrataciones por servicios:</h3>
	<div class="containAll">

		<!-- REPORTE POR SERVICIO -->
		<div  class="tabla">
			<h3>Contrataciones por servicio:</h3>
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
					<select onchange="submit()" name="cboServicio" id="cboServicio" required>
					    <option value="">---Seleccionar---</option>
					    <option value="0">Todos</option>

					</select>

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

					<?php foreach  ($contratacion as $contratacion):

					$idContratacion = $contratacion->getIdContratacion();
					$idUsuarioServicio = $contratacion->getIdUsuarioServicio();
					$usuarioServicio = UsuarioServicio::obtenerPorId($idUsuarioServicio);
					$servicio = $usuarioServicio->servicio->getNombre();
					$idProfesional = $usuarioServicio->getIdUsuario();
					$profesional = Usuario::obtenerPorId($idProfesional);

				?>
				<tbody>
					<tr>
						
						<td><?php echo $contratacion->getIdContratacion(); ?></td>
						<td><?php echo $contratacion->usuario->getNombre().",".$contratacion->usuario->getApellido(); ?></td>
						<td><?php echo $profesional->getNombre().",".$profesional->getApellido(); ?></td>
						<td><?php echo $servicio; ?></td>
						<td><?php echo $contratacion->getCosto(); ?></td>

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
