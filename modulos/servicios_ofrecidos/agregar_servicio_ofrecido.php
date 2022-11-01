<?php

require_once "../../class/Servicio.php";
require_once "../../class/UsuarioServicio.php";

$idUsuario = $_GET['id_usuario'];

$listadoCategorias = Categoria::obtenerTodos();
$listadoSubcategorias = Subcategoria::obtenerTodos();
$listadoServicios = Servicio::obtenerTodos();

// CONTROL DE ERROR
$mensaje ="";

if (isset($_GET["error"])) {
	$error = $_GET["error"];
	switch($error) {
		case "servicio":
			$mensaje = "Ya estas ofreciendo este servicio";
			break;
		case "valor":
			$mensaje = "El valor debe ser superior a cero";
			break;

	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="../../js/contrataciones/funciones.js"></script>
	<script src="../../js/jquery.3.6.js"></script>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleForm.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<style type="text/css">
		label { vertical-align: top;
		}
	</style>
	
</head>
<body>
	
	<?php require_once "../../menuSub.php"; ?>
	

	<div class="containAll">
		

			<form method="POST" action="procesar_servicio_ofrecido.php">

				<div class="tabla">
				<div id="divMensaje">
					<h3 class="defasado">Seleccione:</h3>
					<br>

					<input type="hidden" name="txtIdUsuario" id="txtIdUsuario" value="<?php echo $idUsuario; ?>">

					<label for="cboCategoria">Categoria:</label>
					<select name="cboCategoria" onchange="cargarSubcategorias();" id="cboCategoria" required>
					    <option value="">---Seleccionar---</option>

					    <?php foreach ($listadoCategorias as $categoria): ?>

						    <option value="<?php echo $categoria->getIdCategoria(); ?>">
						    		<?php echo $categoria->getNombre(); ?>
						    </option>

					    <?php endforeach ?>
					</select>
					<br><br>

					<label for="cboSubcategoria">Subcategoria:</label>
					<select name="cboSubcategoria" id="cboSubcategoria" onchange="cargarServicios()" required>
					    <option value="">---Seleccionar---</option>

					</select>
					<br><br>
					<?php if (isset($error)) {
						if ($error == 'servicio') { ?>
						<span><?php echo $mensaje;?></span>
					<?php }}?>
					<label for="cboServicio">Servicio:</label>
					<select name="cboServicio" id="cboServicio" required>
					    <option value="">---Seleccionar---</option>

					</select>
					<br><br>
					<?php if (isset($error)) {
						if ($error == 'valor') { ?>
						<span><?php echo $mensaje;?></span>
					<?php }}?>
					<label for="valorServicio">Valor:</label>
					<input type="number" name="numValor" id="valorServicio" required>

				</div>

				<button class="add" type="submit">Agregar</button>
				</div>
			</form>
		
	</div>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>