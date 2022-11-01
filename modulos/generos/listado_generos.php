<?php

require_once "../../class/Genero.php";
require_once "../../menuSub.php";

$lista = Genero::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
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
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>

