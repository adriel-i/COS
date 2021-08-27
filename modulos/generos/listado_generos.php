<?php

require_once "../../class/Genero.php";
require_once "../../menu.php";

$lista = Genero::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nuevo_genero.php">NUEVO GENERO</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Genero</th>
		<th>Descripcion</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $genero): ?>

		<tr>
			
			<td><?php echo $genero->getIdGenero(); ?></td>
			<td><?php echo $genero->getDescripcion(); ?></td>
			<td>
				<a href="modificar_genero.php?id_genero=<?php echo $genero->getIdGenero(); ?>">Modificar</a> |
			
				<a href="procesar_baja.php?id_genero=<?php echo $genero->getIdGenero(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

