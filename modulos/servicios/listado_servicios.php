<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/Servicio.php";
require_once "../../menu.php";

$lista = Servicio::obtenerTodos();

// ACTIVE RECORD

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nuevo_servicio.php">NUEVO SERVICIO</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Servicio</th>
		<th>Nombre</th>
		<th>Subcategoria</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $servicio): ?>

		<tr>
			
			<td><?php echo $servicio->getIdServicio(); ?></td>
			<td><?php echo $servicio->getNombre(); ?></td>
			<td><?php echo $servicio->categoria->getNombre(); ?></td>
			<td>
				<a href="modificar_servicio.php?id_servicio=<?php echo $servicio->getIdServicio(); ?>">Modificar</a> |
			
			
				<a href="procesar_baja.php?id_servicio=<?php echo $servicio->getIdServicio(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

