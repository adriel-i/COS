<?php

require_once "../../class/TipoPago.php";
require_once "../../menu.php";

$lista = TipoPago::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<a href="nuevo_tipo_pago.php">NUEVO TIPO DE PAGO</a>
	
	<br>
	<br>

<table border="1">
	<tr>
		<th>ID Tipo Pago</th>
		<th>Descripcion</th>
		<th>Porcentaje</th>
		<th>Acciones</th>

	</tr>

	<?php foreach  ($lista as $tipoPago): ?>

		<tr>
			
			<td><?php echo $tipoPago->getIdTipoPago(); ?></td>
			<td><?php echo $tipoPago->getDescripcion(); ?></td>
			<td><?php echo $tipoPago->getPorcentaje(); ?></td>
			<td>
				<a href="modificar_tipo_pago.php?id_tipo_pago=<?php echo $tipoPago->getIdTipoPago(); ?>">Modificar</a> |
			
				<a href="procesar_baja.php?id_tipo_pago=<?php echo $tipoPago->getIdTipoPago(); ?>">Eliminar</a>
			</td>



		</tr>

	<?php endforeach ?>

</table>

</body>
</html>

