<?php

require_once "../../class/Servicio.php";
require_once "../../class/UsuarioServicio.php";

$id_usuario = $_GET['id_usuario'];

$listadoCategorias = Categoria::obtenerTodos();
$listadoSubcategorias = Subcategoria::obtenerTodos();
$listadoServicios = Servicio::obtenerTodos();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="../../js/contrataciones/funciones.js"></script>
	<script src="../../js/jquery.3.6.js"></script>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<link rel="stylesheet" href="../../css/styleForm.css">
	<style type="text/css">
		label { vertical-align: top;
		}
	</style>
</head>
<body>
	
	<?php require_once "../../menuSub.php"; ?>
	
	<!-- <?php //echo $mensaje;?> -->
	
	<div class="contenedor">
		<div class="tabla">
			<h3 class="defasado">Busque el servicio:</h3>
			<div class="search">
				<form class="sinBottom" action="listado_usuarios_servicio_busqueda.php" method="POST">
					<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">
					<input type="text" id="serviSearch" name="serviSearch">
					<br>
					<button class="buscar" type="submit">Buscar</button>
				</form>
				<br>
				<h4 id="or">O</h4>
			</div>	
			
			<h3 class="defasado">Filtre por categoria:</h3>
			<form method="POST" action="listado_usuarios_servicio_busqueda.php">
				<div class="search">
				<div id="divMensaje">
					<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario; ?>">

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

					<label for="cboServicio">Servicio:</label>
					<select name="cboServicio" id="cboServicio" required>
					    <option value="">---Seleccionar---</option>

					</select>

				</div>

				<button class="buscar" type="submit">Buscar</button>
				</div>
			</form>
		</div>
	</div>
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>
