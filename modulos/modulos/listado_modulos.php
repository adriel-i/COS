<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/Modulo.php";
require_once "../../menu.php";

$lista = Modulo::obtenerTodos();

// ACTIVE RECORD

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nuevo_modulo.php">NUEVO MODULO</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Modulo</th>
		<th>Descripcion Modulo</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $modulo): ?>

		<tr>
			
			<td><?php echo $modulo->getIdModulo(); ?></td>
			<td><?php echo $modulo->getDescripcion(); ?></td>
			<td>
				<a href="modificar_modulo.php?id_modulo=<?php echo $modulo->getIdModulo(); ?>">Modificar</a> |
			
				<a href="procesar_baja.php?id_modulo=<?php echo $modulo->getIdModulo(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

