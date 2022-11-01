<?php

require_once "../../class/Subcategoria.php";

$listadoSubcategorias = Subcategoria::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_servicio.php">

		<h3>Agregue un nuevo servicio:</h3>
		
		Nombre: <input type="text" name="txtNombre">
		<br><br>

		Subcategoria:
		<select name="cboSubcategoria" required>
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoSubcategorias as $subcategoria): ?>

		    	<option value="<?php echo $subcategoria->getIdSubcategoria(); ?>">
		    		<?php echo $subcategoria->getNombre(); ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>

		<input type="submit" name="Guardar">
		
	</form>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>