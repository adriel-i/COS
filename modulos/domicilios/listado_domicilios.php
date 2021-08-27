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
</head>
<body>

<?php require_once "../../menu.php"; ?>

<h2><?php echo ""; ?></h2>

<a href="nuevo_domicilio.php?id_persona=<?php echo $idPersona; ?>">NUEVO DOMICILIO</a>
<br><br>

<table border="1">
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
				<a href="modificar_domicilio.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?>&id_persona=<?php echo $idPersona; ?>">Modificar</a> |

				<a href="procesar_baja.php?id_domicilio=<?php echo $domicilio->getIdDomicilio(); ?> &id_persona=<?php echo $idPersona; ?>">Eliminar</a>
			</td>
		</tr>

	<?php endforeach ?>

</table>

</body>
</html>
