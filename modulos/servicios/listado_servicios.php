<?php

require_once "../../class/Servicio.php";
require_once "../../menuSub.php";

$lista = Servicio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<link href="../../css/jquery.dataTables.min.css" rel="stylesheet" />
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/jquery/dataTable.js"></script>
</head>
<body>
	<a href="nuevo_servicio.php">NUEVO SERVICIO</a>

	<div class="contenedor">
		<div class="tabla">
			<h3>Listado de usuarios</h3>

			<table id="miTabla" class="display" >
				<thead>
					<tr>
						<th>ID Servicio</th>
						<th>Nombre</th>
						<th>Subcategoria</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach  ($lista as $servicio): ?>
					<tr>
						<td><?php echo $servicio->getIdServicio(); ?></td>
						<td><?php echo $servicio->getNombre(); ?></td>
						<td><?php echo $servicio->subcategoria->getNombre(); ?></td>
						<td>
							<a class="accion1" href="modificar_servicio.php?id_servicio=<?php echo $servicio->getIdServicio(); ?>">Modificar</a>
							<a class="accion2" href="procesar_baja.php?id_servicio=<?php echo $servicio->getIdServicio(); ?>">Eliminar</a>
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

