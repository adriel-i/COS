<?php
require_once "../../class/Usuario.php";
require_once "../../menu.php";

$lista = Usuario::obtenerTodos();


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nuevo_usuario.php">NUEVO USUARIO</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Usuario</th>
		<th>Username</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>DNI</th>
		<th>Fecha Nacimiento</th>
		<th>Nacionalidad</th>
		<th>Genero</th>
		<th>Contactos</th>
		<th>Domicilios</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $usuario): ?>

		<tr>
			
			<td><?php echo $usuario->getIdUsuario(); ?></td>
			<td><?php echo $usuario->getUsername(); ?></td>
			<td><?php echo $usuario->getNombre(); ?></td>
			<td><?php echo $usuario->getApellido(); ?></td>
			<td><?php echo $usuario->getDni(); ?></td>
			<td><?php echo $usuario->getFechaNacimiento(); ?></td>
			<td><?php echo $usuario->getNacionalidad(); ?></td>
			<td><?php echo $usuario->genero->getDescripcion(); ?></td>
			<td>
				<a href="../contactos/listado_contactos.php?id_persona=<?php echo $usuario->getIdPersona(); ?>"> Ver </a>
			</td>

			<td>
				<a href="../domicilios/listado_domicilios.php?id_persona=<?php echo $usuario->getIdPersona(); ?>"> Ver</a>
			</td>

			<td>
				<a href="modificar_usuario.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>">Modificar</a> |
				<a href="procesar_baja.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>">Eliminar</a>
			</td>


		</tr>

	<?php endforeach ?>

</table>

</body>
</html>










