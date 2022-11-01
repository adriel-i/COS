<?php

require_once "../../class/Categoria.php";

$listadoCategorias = Categoria::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_subcategoria.php">

		<h3>Agregue una nueva subcategoria:</h3>
		
		Nombre: <input type="text" name="txtNombre">
		<br><br>

		Categoria:
		<select name="cboCategoria">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoCategorias as $categoria): ?>

		    	<option value="<?php echo $categoria->getIdCategoria(); ?>">
		    		<?php echo $categoria->getNombre(); ?>
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