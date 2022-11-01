<?php

require_once "../../class/Domicilio.php";
require_once "../../class/Usuario.php";


$idPersona = $_GET['id_persona'];
/*
$modulo = $_GET['modulo'];


switch ($modulo) {

	case 'empleados':
		$persona = Usuarios::obtenerPorIdPersona($idPersona);
		break;

	case 'clientes':
		// $persona = Cliente::obtenerPorIdPersona($idPersona);
	    echo "viene de clientes";
	    exit;
		break;
	
	default:
		echo "Modulo no valido";
		exit;

}
*/

$listadoDomicilios = Domicilio::obtenerPorIdPersona($idPersona);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Domicilios</title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="../../css/jquery.modal.min.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
</head>
<body>

	<?php require_once "../../menuSub.php"; ?>

	<a class="add" style="width:165px;" href="nuevo_domicilio.php?id_persona=<?php echo $idPersona; ?>">NUEVO DOMICILIO</a>	
	<div class="containAll">
		<div class="tabla">
			<h3>Listado de Domicilios</h3>
			<table>
				<thead>
					<tr>
						<th>Barrio</th>
						<th>Calle</th>
						<th>Altura</th>
						<th>Manzana</th>
						<th>Numero Casa</th>
						<th>Torre</th>
						<th>Piso</th>
						<th>Observaciones</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach  ($listadoDomicilios as $domicilio): ?>
					<tr>
						<td><?php echo $domicilio->getBarrio(); ?></td>
						<td><?php echo $domicilio->getCalle(); ?></td>
						<td><?php echo $domicilio->getAltura(); ?></td>
						<td><?php echo $domicilio->getManzana(); ?></td>
						<td><?php echo $domicilio->getNumeroCasa(); ?></td>
						<td><?php echo $domicilio->getTorre(); ?></td>
						<td><?php echo $domicilio->getPiso(); ?></td>
						<td><?php echo $domicilio->getObservaciones(); ?></td>
						<td>
							<a class="accion1" href="modificar_domicilio.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_persona=<?php echo $idPersona; ?>">Modificar</a>
							<a id="botonCancelar" href="#ex1" rel="modal:open">Eliminar</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal jQuery -->
	<div id="ex1" class="modal">
	  <p>¿Está seguro de que desea eliminar este registro?</p>
	  <a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	  <a class="boton" id="aceptar" href="procesar_baja.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?> &id_persona=<?php echo $idPersona; ?>">Aceptar</a>
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>
