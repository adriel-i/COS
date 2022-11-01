<?php

require_once "../../class/TipoContacto.php";
require_once "../../menuSub.php";

$lista = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<br>
	<br>

	<table border="1">
		<tr>
			<th>ID Tipo Contacto</th>
			<th>Descripcion</th>
			<th>Acciones</th>

		</tr>

		<?php foreach  ($lista as $tipoContacto): ?>

			<tr>
				
				<td><?php echo $tipoContacto->getIdTipoContacto(); ?></td>
				<td><?php echo $tipoContacto->getDescripcion(); ?></td>
				<td>
					<a href="modificar_tipo_contacto.php?id_tipo_contacto=<?php echo $tipoContacto->getIdTipoContacto(); ?>">Modificar</a> |
				
					<a href="procesar_baja.php?id_tipo_contacto=<?php echo $tipoContacto->getIdTipoContacto(); ?>">Eliminar</a>
				</td>



			</tr>

		<?php endforeach ?>

	</table>

	<br>

	<form method="POST" action="procesar_tipo_contacto.php">

		<h3>Agregue un nuevo tipo de contacto:</h3>
		
		Descripcion: <input type="text" name="txtDescripcion">
		<br><br>
		
		<input type="submit" name="Guardar">
		
	</form>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>

