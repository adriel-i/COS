<?php

require_once "class/Usuario.php";
require_once "configs.php";
//  SESION START TIENE QUE ESTAR EN TOOS LOS LUGARES DONDE SE NECESITE CONTROL DE SESIONES
// ACTIVAMOS LA SESION
session_start();
// SI EXISTE LA VARIABLE DE SESION USUARIO ENTONCES = AL USUARIO QUE CREAMOS EN ANTERIORMENTE Y SIGUE LA EJECUCION DEL CODIGO DE ABAJO
if (isset($_SESSION['usuario'])) {
	$usuarioLogueado = $_SESSION['usuario'];
} else {
	// SINO REDIRECCIONA AL LOGIN CON UN MENSAJE DE ERROR
	header("location: /Programacion_3/COS/form_login.php?error=" . MENSAJE_CODE);
	exit;
}

?>
<a href="/Programacion_3/COS/inicio.php"> Inicio</a> |
<a href="/Programacion_3/COS/modulos/usuarios/listado_usuarios.php">Usuarios</a> |
<a href="/Programacion_3/COS/modulos/servicios/listado_servicios.php">Servicios</a> |
<a href="/Programacion_3/COS/modulos/subcategorias/listado_subcategorias.php">Subcategorias</a> |
<a href="/Programacion_3/COS/modulos/categorias/listado_categorias.php">Categorias</a> |
<a href="/Programacion_3/COS/modulos/perfiles/listado_perfiles.php">Perfiles</a> |
<a href="/Programacion_3/COS/modulos/modulos/listado_modulos.php">Modulos</a> |
<a href="/Programacion_3/COS/modulos/tipos_impuestos/listado_tipos_impuestos.php">Tipos de Impuestos</a> |
<a href="/Programacion_3/COS/modulos/tipos_vencimientos/listado_tipos_vencimientos.php">Tipos de Vencimientos</a> |
<a href="/Programacion_3/COS/modulos/tipos_facturas/listado_tipos_facturas.php">Tipos de Facturas</a> |
<a href="/Programacion_3/COS/modulos/tipos_pagos/listado_tipos_pagos.php">Tipos de Pagos</a> |
<a href="/Programacion_3/COS/modulos/tipos_contactos/listado_tipos_contactos.php">Tipos de Contactos</a> |
<a href="/Programacion_3/COS/modulos/generos/listado_generos.php">Generos</a> |
<a href="/Programacion_3/COS/cerrar_sesion.php">Cerrar Sesion</a> 
<br><br>