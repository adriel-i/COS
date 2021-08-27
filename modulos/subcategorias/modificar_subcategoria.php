<?php

require_once "../../class/Subcategoria.php";
require_once "../../class/Categoria.php";

$listadoCategorias = Categoria::obtenerTodos();

$id_subcategoria = $_GET['id_subcategoria'];

$subcategoria = Subcategoria::obtenerPorId($id_subcategoria);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_modificacion.php">

		<h3>Modifique la subcategoria</h3>
		<br>
		<input type="hidden" name="txtIdSubcategoria" value="<?php echo $id_subcategoria; ?>">
		
		Nombre: <input type="text" name="txtNombre" value="<?php echo $subcategoria->getNombre(); ?>">
		<br><br>

		Categoria:
		<select name="cboCategoria">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoCategorias as $categoria): ?>

		    	<?php
		    	$selected = "";

		    	if ($categoria->getIdCategoria() == $subcategoria->getIdCategoria()) {
		    		$selected = "SELECTED";
		    	}

		    	?>
		    	<option <?php echo $selected; ?> value="<?php echo $categoria->getIdCategoria(); ?>">
		    		<?php echo $categoria->getNombre(); ?>
		    	</option>

		    <?php endforeach ?>
		</select>
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">


	</form>

</body>
</html>

