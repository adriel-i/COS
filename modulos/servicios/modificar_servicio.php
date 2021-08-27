<?php

require_once "../../class/Servicio.php";
require_once "../../class/Subcategoria.php";

$listadoSubcategorias = Subcategoria::obtenerTodos();

$id_servicio = $_GET['id_servicio'];

$servicio = Servicio::obtenerPorId($id_servicio);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_modificacion.php">

		<h3>Modifique el servicio</h3>
		<br>
		<input type="hidden" name="txtIdServicio" value="<?php echo $id_servicio; ?>">
		
		Nombre: <input type="text" name="txtNombre" value="<?php echo $servicio->getNombre(); ?>">
		<br><br>

		Subcategoria:
		<select name="cboSubcategoria">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoSubcategorias as $subcategoria): ?>

		    	<?php
		    	$selected = "";

		    	if ($subcategoria->getIdSubcategoria() == $servicio->getIdSubcategoria()) {
		    		$selected = "SELECTED";
		    	}

		    	?>
		    	<option <?php echo $selected; ?> value="<?php echo $subcategoria->getIdSubcategoria(); ?>">
		    		<?php echo $subcategoria->getNombre(); ?>
		    	</option>

		    <?php endforeach ?>
		</select>
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">


	</form>

</body>
</html>

