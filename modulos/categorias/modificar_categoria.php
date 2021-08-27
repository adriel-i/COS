<?php

require_once "../../class/Categoria.php";

$id_categoria = $_GET['id_categoria'];

$categoria = Categoria::obtenerPorId($id_categoria);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_modificacion.php">

		<h3>Modifique la categoria</h3>
		<br>
		<input type="hidden" name="txtIdCategoria" value="<?php echo $id_categoria; ?>">
		
		Nombre: <input type="text" name="txtNombre" value="<?php echo $categoria->getNombre(); ?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">


	</form>

</body>
</html>

