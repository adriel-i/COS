<?php

require_once "../../class/Perfil.php";

$id_perfil = $_GET['id_perfil'];

$perfil = Perfil::obtenerPorId($id_perfil);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_modificacion.php">

		<h3>Modifique el perfil</h3>
		<br>
		<input type="hidden" name="txtIdPerfil" value="<?php echo $id_perfil; ?>">
		
		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $perfil->getDescripcion(); ?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">


	</form>

</body>
</html>

