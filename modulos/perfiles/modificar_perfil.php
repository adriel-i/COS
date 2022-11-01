<?php

require_once "../../class/Perfil.php";
require_once "../../class/PerfilModulo.php";
require_once "../../class/Modulo.php";

$id_perfil = $_GET["id_perfil"];
$perfil = Perfil::obtenerPorId($id_perfil);
$listadoModulos = Modulo::obtenerTodos();

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
		<h1>Modifique el perfil</h1>

		<form method="POST" action="procesar_modificacion.php">
			<?php echo $mensaje; ?>
			<input type="hidden" name="txtIdPerfil" value="<?php echo $id_perfil; ?>">

			Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $perfil->getDescripcion(); ?>">
			<br><br>
			Modulos :

			<select multiple name = "cboModulo[]">
				<option value = "">--Seleccionar--</option>
				<?php foreach ($listadoModulos as $modulo): ?>
				
				<?php
				$selected = '';

				foreach ($perfil->getModulos() as $perfilModulo) {
					if ($modulo->getIdModulo() == $perfilModulo->getIdModulo()) {
						$selected = "SELECTED";
					}
				}

				?>
					<option <?php echo $selected; ?> value="<?php echo $modulo->getIdModulo(); ?>">
						<?php echo $modulo->getDescripcion(); ?>
					</option>

				<?php endforeach ?>
			</select>

			<br><br>
			</select>
			<br><br>

			<input type="submit" name="Guardar" value="Actualizar">
			
		</form>
	</section>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>




<!-- <?php
/*
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

 -->
 */
