<?php

require_once "../../class/TipoFactura.php";
require_once "../../menuSub.php";

$lista = TipoFactura::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
</head>
<body>


	<a href="nuevo_tipo_factura.php">NUEVO TIPO DE FACTURA</a>
	
	<br>
	<br>

	<table border="1">
		<tr>
			<th>ID Tipo Factura</th>
			<th>Descripcion</th>
			<th>Acciones</th>

		</tr>

		<?php foreach  ($lista as $tipoFactura): ?>

			<tr>
				
				<td><?php echo $tipoFactura->getIdTipoFactura(); ?></td>
				<td><?php echo $tipoFactura->getDescripcion(); ?></td>
				<td>
					<a href="modificar_tipo_factura.php?id_tipo_factura=<?php echo $tipoFactura->getIdTipoFactura(); ?>">Modificar</a> |
				
					<a href="procesar_baja.php?id_tipo_factura=<?php echo $tipoFactura->getIdTipoFactura(); ?>">Eliminar</a>
				</td>



			</tr>

		<?php endforeach ?>

	</table>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>

