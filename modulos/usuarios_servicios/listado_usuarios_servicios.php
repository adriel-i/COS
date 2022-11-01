<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/UsuarioServicio.php";
require_once "../../menuSub.php";

$lista = UsuarioServicio::obtenerTodos();

// ACTIVE RECORD

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link href="../../css/jquery.dataTables.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="../../css/jquery.modal.min.css">
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


	<!-- <a href="nuevo_servicio.php">NUEVO SERVICIO</a> -->
	
	<br>
	<br>
	<div class="contenedor">
		<div class="tabla">
			<h3>Listado servicios de usuarios:</h3>
			<table id="miTabla" class="display">
				<thead>
					<tr>
						<th>ID Usuario Servicio</th>
						<th>Usuario</th>
						<th>Servicio</th>
						<th>Valor</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<?php foreach  ($lista as $usuarioServicio): ?>
				<tbody>
					<tr>
						<td><?php echo $usuarioServicio->getIdUsuarioServicio(); ?></td>
						<td><?php echo $usuarioServicio->usuario->getUsername(); ?></td>
						<td><?php echo $usuarioServicio->servicio->getNombre(); ?></td>
						<td><?php echo $usuarioServicio->getValor(); ?></td>
						<td>
							<a class="accion1" href="modificar_usuario_servicio.php?id_usuario_servicio=<?php echo $usuarioServicio->getIdUsuarioServicio(); ?>">Modificar</a>
							<a id="botonCancelar" href="#ex1" rel="modal:open">Eliminar</a>
						</td>
					</tr>

				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal jQuery -->
	<div id="ex1" class="modal">
	  <p>¿Está seguro de que desea eliminar este registro?</p>
	  <a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	  <a class="boton" id="aceptar" href="procesar_baja.php?id_usuario_servicio=<?php echo $usuarioServicio->getIdUsuarioServicio(); ?>">Aceptar</a>
	</div>
	
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>

