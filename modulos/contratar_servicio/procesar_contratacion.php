<?php

require_once "../../class/Contratacion.php";

$idUsuario = $_POST['txtIdUsuario'];
$idServicio = $_POST['cboServicio'];
$idUsuarioServicio = $_POST['txtIdUsuarioServicio'];
$valor = $_POST['intValor'];
$observaciones = trim($_POST['txtObservaciones']);
$fecha = $_POST['dtFecha'];
$hora = $_POST['tmHora'];
// $fechaHora = $_POST['dtFechaHora'];
$fechaHora = $fecha." ".$hora;
$usuarioServicio = $_POST['txtIdUsuarioServicio'];
$contratacion = new Contratacion();

$contratacion->setCosto($valor);
$contratacion->setObservaciones($observaciones);
$contratacion->setFechaHora($fechaHora);
$contratacion->setIdUsuario($idUsuario);
$contratacion->setIdUsuarioServicio($idUsuarioServicio);

$contratacion->guardar();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script>
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["datosContratacion"].submit();
    }
    </script>
</head>
<body>
	<form method="POST" action="servicio_contratado.php" name="datosContratacion">
		<input type="hidden" name="txtIdUsuario" value="<?php echo $idUsuario; ?>">
		<input type="hidden" name="cboServicio" value="<?php echo $idServicio; ?>">
		<input type="hidden" name="txtIdUsuarioServicio" value="<?php echo $usuarioServicio; ?>">
	</form>

</body>
</html>
