<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/Categoria.php";
require_once "../../menuSub.php";

$lista = Categoria::obtenerTodos();

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
	<script src="../../js/jquery.dataTables.min.js"></script>
	<script defer>
		$(document).ready(function() {
			$('#miTabla').DataTable({
				searching: true,
				ordering: false,
				paging: true,
			});
		});
	</script>
</head>
<body>

	<h3><a href="nueva_categoria.php"><img class="mas" src="../../imagenes/Icons/mas.png"> NUEVA CATEGORIA</a></h3>
	<div class="contenedor">
		<div class="tabla">
			<h3>Listado Categorias:</h3>
			<table id="miTabla" class="display">
				<thead>
					<tr>
						<th>ID Categoria</th>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach  ($lista as $categoria): ?>
					<tr>
						<td><?php echo $categoria->getIdCategoria(); ?></td>
						<td><?php echo $categoria->getNombre(); ?></td>
						<td>
							<a class="accion1" href="modificar_categoria.php?id_categoria=<?php echo $categoria->getIdCategoria(); ?>">
							Modificar</a>
							<a class="accion2" href="procesar_baja.php?id_categoria=<?php echo $categoria->getIdCategoria(); ?>">Eliminar</a>
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

