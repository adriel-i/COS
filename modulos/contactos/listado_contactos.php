<?php
// error_reporting(0);
require_once "../../class/Contacto.php";
require_once "../../class/Usuario.php";
require_once "../../class/TipoContacto.php";


// CONTROL DE ERROR

$mensaje ="";

if (isset($_GET["error"])) {
	switch($_GET["error"]) {
		case "tipoContacto":
			$mensaje = "Debe seleccionar un tipo de contacto";
			break;
		case "valor":
			$mensaje = "Valor invalido";
			break;
	}
}

$idPersona = $_GET["id_persona"];
$listadoContactos = Contacto::obtenerPorIdPersona($idPersona);
$listadoTiposContactos = TipoContacto::obtenerTodos();


$usuario = Usuario::obtenerPorIdPersona($idPersona);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="../../css/jquery.modal.min.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<link rel="stylesheet" href="../../css/styleForm.css">
	<script src="../../js/contactos/funciones.js"></script>
</head>
<body>

	<?php require_once "../../menuSub.php"; ?>
	<h3>Lista de contactos de: <?php echo $usuario->getNombre().", ". $usuario->getApellido();?></h3>
	<div class="centrar">

		<div class="tabla">
			<h3 class="defasado">Contactos:</h3>
			<table>
				<thead>
					<tr>
						<th>Descripcion</th>
						<th>Valor</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach  ($listadoContactos as $contacto): ?>
					<tr>
						<td><?php echo $contacto->getDescripcion(); ?></td>
						<td><?php echo $contacto->getValor(); ?></td>
						<td>
							<a id="botonCancelar" href="#ex1" rel="modal:open">Eliminar</a>
							</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		
	</div>
	<div class="centrar">
		<div class="tabla">
			<h3 class="defasado">Agregar nuevo contacto:</h3>
			<?php echo $mensaje;?>

			<form method="POST" action="procesar_contacto.php">
				<div id="divMensaje">
					<input type="hidden" name="txtIdPersona" value="<?php echo $idPersona; ?>">
						<label for="varTipoContacto">Tipo de Contacto</label>
						<select name="cboTipoContacto" id="varTipoContacto" required>
							<option value="" selected>-- Seleccionar --</option>

							<?php foreach ($listadoTiposContactos as $tipoContacto): ?>

							<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
								<?php echo $tipoContacto->getDescripcion(); ?>
							</option>
								
							<?php endforeach ?>
						</select>
						<br>
						<!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
						<label for="varValor">Valor</label>
						<input type="text" name="txtValor" id="varValor" required>
						<!-- &nbsp;&nbsp;&nbsp; -->
				</div>
				<button class="add" type="submit" onclick="return validar();">
				Agregar</button>
			</form>
			</div>
		</div>

		<!-- Modal jQuery -->
		<div id="ex1" class="modal">
		  <p>¿Está seguro de que desea eliminar este contacto?</p>
		  <a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
		  <a class="boton" id="aceptar" href="procesar_baja.php?idPersonaTipoContacto=<?php echo $contacto->getIdPersonaTipoContacto(); ?>&id_persona=<?php echo $contacto->getIdPersona(); ?>">Aceptar</a>
		</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>