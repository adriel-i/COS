<?php

require_once "../../class/Modulo.php";

$id_modulo = $_GET['id_modulo'];

$modulo = Modulo::obtenerPorId($id_modulo);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_modificacion.php">

		<h3>Modifique el modulo</h3>
		<br>
		<input type="hidden" name="txtIdModulo" value="<?php echo $id_modulo; ?>">
		
		Nombre: <input type="text" name="txtDescripcion" value="<?php echo $modulo->getDescripcion(); ?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">


	</form>

</body>
</html>

