<?php

require_once "../../class/Genero.php";

$listadoGeneros = Genero::obtenerTodos();

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once "../../menu.php"; ?>

	<form method="POST" action="procesar_usuario.php">
		
		Nombre: <input type="text" name="txtNombre">
		<br><br>

		Apellido: <input type="text" name="txtApellido">
		<br><br>

		DNI: <input type="number" name="numDni">
		<br><br>

		Fecha de Nacimiento: <input type="date" name="dateFechaNacimiento">
		<br><br>

		Nacionalidad: <input type="text" name="txtNacionalidad">
		<br><br>

		Genero:
		<select name="cboGenero">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoGeneros as $genero): ?>

		    	<option value="<?php echo $genero->getIdGenero(); ?>">
		    		<?php echo $genero->getDescripcion(); ?>
		    	</option>

		    <?php endforeach ?>
		</select>
		<br><br>

		Nombre de Usuario: <input type="text" name="txtUsername">
		<br><br>

		Contrasena: <input type="password" name="pwrContrasena">
		<br><br>

		<input type="submit" name="Guardar">


	</form>

</body>
</html>