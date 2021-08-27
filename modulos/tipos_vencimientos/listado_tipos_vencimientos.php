<?php

require_once "../../class/TipoVencimiento.php";
require_once "../../menu.php";

$lista = TipoVencimiento::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nuevo_tipo_vencimiento.php">NUEVO TIPO DE VENCIMIENTO</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Tipo Vencimiento</th>
		<th>Descripcion</th>
		<th>Porcentaje</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $tipoVencimiento): ?>

		<tr>
			
			<td><?php echo $tipoVencimiento->getIdTipoVencimiento(); ?></td>
			<td><?php echo $tipoVencimiento->getDescripcion(); ?></td>
			<td><?php echo $tipoVencimiento->getPorcentaje(); ?></td>
			<td>
				<a href="modificar_tipo_vencimiento.php?id_tipo_vencimiento=<?php echo $tipoVencimiento->getIdTipoVencimiento(); ?>">Modificar</a> |
			
				<a href="procesar_baja.php?id_tipo_vencimiento=<?php echo $tipoVencimiento->getIdTipoVencimiento(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

