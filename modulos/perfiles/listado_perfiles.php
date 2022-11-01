<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/Perfil.php";
require_once "../../class/PerfilModulo.php";
require_once "../../menuSub.php";

$lista = Perfil::obtenerTodos();

// ACTIVE RECORD

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
</head>
<body>


	<a href="nuevo_perfil.php">NUEVO PERFIL</a>
	
	<br>
	<br>

	<table border="1">
		<tr>
			<th>ID Perfil</th>
			<th>Descripcion</th>
			<th>Acciones</th>

		</tr>

		<?php foreach  ($lista as $perfil): ?>

			<tr>
				
				<td><?php echo $perfil->getIdPerfil(); ?></td>
				<td><?php echo $perfil->getDescripcion(); ?></td>
				<td>
					<a href="modificar_perfil.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>">Modificar</a> |
				
					<a href="procesar_baja.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>">Eliminar</a>
				</td>

			</tr>

		<?php endforeach ?>

	</table>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>

