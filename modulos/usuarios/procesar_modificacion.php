<?php
require_once "../../menu.php";
require_once "../../class/Usuario.php";
require_once "../../class/Genero.php";

$id_usuario = $_POST['txtIdUsuario'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['numDni'];
$fechaNacimiento = $_POST['dateFechaNacimiento'];
$nacionalidad = $_POST['txtNacionalidad'];
$idGenero = $_POST['cboGenero'];
$username = $_POST['txtUsername'];
$password = $_POST['pwrContrasena'];




$usuario = Usuario::obtenerPorId($id_usuario);

$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setDni($dni);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setNacionalidad($nacionalidad);
$usuario->setIdGenero($idGenero);
$usuario->setContrasena($password);
$usuario->setUsername($username);
$usuario->setIdEstado(1);

$usuario->actualizar();

header("location: listado_usuarios.php")
?>
