<?php

require_once "../../class/Contacto.php";
require_once "../../class/TipoContacto.php";


$idPersona = $_GET["id_persona"];

$listadoContactos = Contacto::obtenerPorIdPersona($idPersona);

$listadoTiposContactos = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php require_once "../../menu.php"; ?>

<h3>Contactos de: <?php echo "" ?></h3>

<table border="1">
	<tr>
		<th>Descripcion</th>
		<th>Valor</th>
		<th>Accion</th>
	</tr>

	<?php foreach  ($listadoContactos as $contacto): ?>

		<tr>
			<td><?php echo $contacto->getDescripcion(); ?></td>
			<td><?php echo $contacto->getValor(); ?></td>
			<td>
				<a href="procesar_baja.php?idPersonaTipoContacto=<?php echo $contacto->getIdPersonaTipoContacto(); ?>&id_persona=<?php echo $contacto->getIdPersona(); ?>">
					Eliminar
				</a>
			</td>
		</tr>

	<?php endforeach ?>

</table>

<br>
<h3>Agregar nuevo contacto:</h3>
<br>

<form method="POST" action="procesar_contacto.php">

	<input type="hidden" name="txtIdPersona" value="<?php echo $idPersona; ?>">

	<label>Tipo Contacto</label>
	<select name="cboTipoContacto">
		<option value=0>-- Seleccionar --</option>

		<?php foreach ($listadoTiposContactos as $tipoContacto): ?>

			<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
				<?php echo $tipoContacto->getDescripcion(); ?>
			</option>
			
		<?php endforeach ?>

	</select>
	
	&nbsp;&nbsp;&nbsp;&nbsp;

	<label>Valor</label>
	<input type="text" name="txtValor">
	
	&nbsp;&nbsp;&nbsp;

	<input type="submit" value="Agregar">


</form>

</body>
</html>
