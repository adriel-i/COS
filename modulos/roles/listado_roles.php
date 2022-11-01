<?php

require_once "../../class/Rol.php";
require_once "../../menuSub.php";

$lista = Rol::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
</head>
<body>


	<a href="nuevo_rol.php">NUEVO ROL</a>
	
	<br>
	<br>

	<table border="1">
		<tr>
			<th>ID Rol</th>
			<th>Descripcion</th>
			<th>Acciones</th>

		</tr>

		<?php foreach  ($lista as $rol): ?>

			<tr>
				
				<td><?php echo $rol->getIdRol(); ?></td>
				<td><?php echo $rol->getDescripcion(); ?></td>
				<td>
					<a href="modificar_rol.php?id_rol=<?php echo $rol->getIdRol(); ?>">Modificar</a> |
				
					<a href="procesar_baja.php?id_rol=<?php echo $rol->getIdRol(); ?>">Eliminar</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>	

</body>
</html>

