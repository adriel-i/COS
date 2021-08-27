<?php

require_once "../../class/Usuario.php";
require_once "../../class/Genero.php";

$listadoGeneros = Genero::obtenerTodos();

$id_usuario = $_GET['id_usuario'];

$usuario = Usuario::obtenerPorId($id_usuario);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_modificacion.php">

		<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">
		
		Nombre: <input type="text" name="txtNombre" value="<?php echo $usuario->getNombre(); ?>">
		<br><br>

		Apellido: <input type="text" name="txtApellido" value="<?php echo $usuario->getApellido(); ?>">
		<br><br>

		DNI: <input type="number" name="numDni" value="<?php echo $usuario->getDni(); ?>">
		<br><br>

		Fecha de Nacimiento: <input type="date" name="dateFechaNacimiento" value="<?php echo $usuario->getFechaNacimiento(); ?>">
		<br><br>

		Nacionalidad: <input type="text" name="txtNacionalidad" value="<?php echo $usuario->getNacionalidad(); ?>">
		<br><br>

		Genero:
		<select name="cboGenero">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoGeneros as $genero): ?>

		    	<?php
		    	$selected = "";

		    	if ($genero->getIdGenero() == $usuario->getIdGenero()) {
		    		$selected = "SELECTED";
		    	}

		    	?>
		    	<option <?php echo $selected; ?> value="<?php echo $genero->getIdGenero(); ?>">
		    		<?php echo $genero->getDescripcion(); ?>
		    	</option>

		    <?php endforeach ?>
		</select>
		<br><br>

		Nombre de Usuario: <input type="text" name="txtUsername" value="<?php echo $usuario->getUsername(); ?>">
		<br><br>

		Contrasena: <input type="password" name="pwrContrasena" value="<?php echo $usuario->getContrasena(); ?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">


	</form>

</body>
</html>

