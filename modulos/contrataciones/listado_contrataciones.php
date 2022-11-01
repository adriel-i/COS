<?php

require_once "../../class/Contratacion.php";
// $id_usuario = $_GET['id_usuario'];

$contratacion = Contratacion::obtenerTodos();
// highlight_string(var_export($contratacion, true));

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
</head>
<body>
	<?php require_once "../../menuSub.php"; ?>
	
	<br>
	<br>
	<div class="contenedor">
		<div class="tabla">
			<h3>Listado Contrataciones:</h3>
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
							<a class="accion1" href="detalle_contratacion.php?idContratacion=<?php echo $idContratacion;?>">Detalles</a>
						</td>

					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>
