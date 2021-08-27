<?php

require_once "../../class/Usuario.php";
require_once "../../class/Genero.php";


$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['numDni'];
$fechaNacimiento = $_POST['dateFechaNacimiento'];
$nacionalidad = $_POST['txtNacionalidad'];
$idGenero = $_POST['cboGenero'];
$username = $_POST['txtUsername'];
$password = $_POST['pwrContrasena'];


if ($dni == ""):
    $dni = "NULL";
else:
    $dni = $dni;
endif;

$usuario = new Usuario();

$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setDni($dni);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setNacionalidad($nacionalidad);
$usuario->setIdGenero($idGenero);
$usuario->setContrasena($password);
$usuario->setUsername($username);
$usuario->setIdEstado(1);

$usuario->guardar();

header("location: listado_usuarios.php")
?>
