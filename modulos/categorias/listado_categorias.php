<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/Categoria.php";
require_once "../../menu.php";

$lista = Categoria::obtenerTodos();

// ACTIVE RECORD

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nueva_categoria.php">NUEVA CATEGORIA</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Categoria</th>
		<th>Nombre</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $categoria): ?>

		<tr>
			
			<td><?php echo $categoria->getIdCategoria(); ?></td>
			<td><?php echo $categoria->getNombre(); ?></td>
			<td>
				<a href="modificar_categoria.php?id_categoria=<?php echo $categoria->getIdCategoria(); ?>">Modificar</a> |
			
				<a href="procesar_baja.php?id_categoria=<?php echo $categoria->getIdCategoria(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

