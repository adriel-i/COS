<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/Subcategoria.php";
require_once "../../menu.php";

$lista = Subcategoria::obtenerTodos();

// ACTIVE RECORD

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nueva_subcategoria.php">NUEVA SUBCATEGORIA</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Subcategoria</th>
		<th>Nombre</th>
		<th>Categoria</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $subcategoria): ?>

		<tr>
			
			<td><?php echo $subcategoria->getIdSubcategoria(); ?></td>
			<td><?php echo $subcategoria->getNombre(); ?></td>
			<td><?php echo $subcategoria->categoria->getNombre(); ?></td>
			<td>
				<a href="modificar_subcategoria.php?id_subcategoria=<?php echo $subcategoria->getIdSubcategoria(); ?>">Modificar</a> |
			
				<a href="procesar_baja.php?id_subcategoria=<?php echo $subcategoria->getIdSubcategoria(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

