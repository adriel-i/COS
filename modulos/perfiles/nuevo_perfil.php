
<?php

require_once "../../class/Modulo.php";

$listadoModulo = Modulo::obtenerTodos();

$mensaje = "";
if (isset($_GET["error"])){

	switch($_GET["error"]){
		case "descripcion0":
			$mensaje = "Ingrese una descripcion.";
			break;
		case "descripcion<3":
			$mensaje = "Requiere más de 3 caracteres.";
			break;
		case "modulo0":
			$mensaje = "Ingrese al menos un modulo.";
			break;
	}
}
?>
	
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<header>
			<?php require_once "../../menu.php"; ?>
	</header>
	<section>

		<form method="POST" action="procesar_perfil.php">
			<h1>Agregue un nuevo perfil</h1>
		<?php echo $mensaje; ?><br>
			Descripcion: <input type="text" name="txtDescripcion">
			<br><br>

			Modulos :

			<select multiple name = "cboModulo[]">
				<option value = "">--Seleccionar--</option>
				<?php foreach ($listadoModulo as $modulo): ?>

					<option value="<?php echo $modulo->getIdModulo(); ?>">
						<?php echo $modulo->getDescripcion(); ?>
					</option>

				<?php endforeach ?>
			</select>
			<br><br>

			<input type="submit" name="Guardar">
			
		</form>
	</section>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>
