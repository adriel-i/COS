<?php

require_once "../../class/TipoImpuesto.php";
require_once "../../menu.php";

$lista = TipoImpuesto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nuevo_tipo_impuesto.php">NUEVO TIPO DE IMPUESTO</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Tipo Impuesto</th>
		<th>Descripcion</th>
		<th>Porcentaje</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $tipoImpuesto): ?>

		<tr>
			
			<td><?php echo $tipoImpuesto->getIdTipoImpuesto(); ?></td>
			<td><?php echo $tipoImpuesto->getDescripcion(); ?></td>
			<td><?php echo $tipoImpuesto->getPorcentaje(); ?></td>
			<td>
				<a href="modificar_tipo_impuesto.php?id_tipo_impuesto=<?php echo $tipoImpuesto->getIdTipoImpuesto(); ?>">Modificar</a> |
			
				<a href="procesar_baja.php?id_tipo_impuesto=<?php echo $tipoImpuesto->getIdTipoImpuesto(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

