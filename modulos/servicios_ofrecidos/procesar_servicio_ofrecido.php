<?php 

require_once "../../class/UsuarioServicio.php";

$idUsuario = $_POST['txtIdUsuario'];
$idServicio = $_POST['cboServicio'];
$valor = $_POST['numValor'];

// VALIDACION

$sql = "SELECT * FROM usuarios_servicios WHERE id_estado_atributo = 1 AND id_usuario = $idUsuario AND id_servicio = $idServicio ";

$database = new MySQL();
$datos = $database->consultar($sql);

if ($datos->num_rows > 0) {

    header("location: agregar_servicio_ofrecido.php?id_usuario=$usuario&error=servicio");
    exit;
}

if ($valor < 0) {
    header("location: agregar_servicio_ofrecido.php?id_usuario=$usuario&error=valor");
    exit;
}


$usuarioServicio = new UsuarioServicio();

$usuarioServicio->setValor($valor);
$usuarioServicio->setIdServicio($idServicio);
$usuarioServicio->setIdUsuario($idUsuario);
$usuarioServicio->setIdEstadoAtributo(1);

$usuarioServicio->guardar();

header("location: listado_servicios_ofrecidos.php?id_usuario=$idUsuario");

?>