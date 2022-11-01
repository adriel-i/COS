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
	header("location: /Proyectos/COS_2.0/form_login.php?error=" . MENSAJE_CODE);
	exit;
}

$idPerfil= $usuarioLogueado->getIdPerfil();
$idUsuario = $usuarioLogueado->getIdUsuario();

$listadoModulosMenu = $usuarioLogueado->perfil->getModulos();
const ADMINISTRADOR = 1;
const CLIENTE = 2;
const PROFESIONAL = 3;
const CLIENTE_PROFESIONAL = 4;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="shortcut icon" href="../../imagenes/Marca/Marca2.png">
	<link rel="stylesheet" href="../../css/styleMenu.css">

	<style type="text/css">
		div.menu nav ul.general li a.invisible {
			
			background-color: transparent;
			margin-bottom: 0px;
			margin-top: -10px;
			margin-right: 15px;
		}
	</style>
</head>
	<body>

		<div class="menu">
			<nav>
				<ul class="general">
					<li><a class="invisible" href="../../inicio.php"><img src="../../imagenes/Marca/Marca1.png" class="marcaMenu"></a></li>
					<li><a href="/Proyectos/COS_2.0/inicio.php">Inicio</a></li>

					<!-- ADMINISTRADOR -->

					<?php if ($idPerfil == ADMINISTRADOR) { ?>
						
						<li class="dropDown"><a href="#">ABMs</a>
							<div class="dropDown-content">
								<ul class="drop">
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/usuarios/listado_usuarios.php">Usuarios</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/servicios/listado_servicios.php">Servicios</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/subcategorias/listado_subcategorias.php">Subcategorias</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/categorias/listado_categorias.php">Categorias</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/perfiles/listado_perfiles.php">Perfiles</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/modulos/listado_modulos.php">Modulos</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/tipos_impuestos/listado_tipos_impuestos.php" id="doubleLine">Tipos de Impuestos</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/tipos_vencimientos/listado_tipos_vencimientos.php" id="doubleLine">Tipos de Vencimientos</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/tipos_facturas/listado_tipos_facturas.php" id="doubleLine">Tipos de Facturas</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/tipos_pagos/listado_tipos_pagos.php" id="doubleLine">Tipos de Pagos</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/tipos_contactos/listado_tipos_contactos.php" id="doubleLine">Tipos de Contactos</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/generos/listado_generos.php">Generos</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/roles/listado_roles.php">Roles</a>
									</li>
								</ul>
							</div>
						</li>

						<li><a href="/Proyectos/COS_2.0/modulos/usuarios_servicios/listado_usuarios_servicios.php" id="doubleLine">
						Servicios de Usuarios</a></li>
						<li><a href="/Proyectos/COS_2.0/modulos/contrataciones/listado_contrataciones.php?id_usuario=<?php echo $idUsuario?>">Contrataciones</a></li>
						<li class="dropDown"><a href="#">Reportes</a>
							<div class="dropDown-content">
								<ul class="drop">
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/reportes/listado_reportes_contrataciones.php?id_usuario=<?php echo $idUsuario?>">Contrataciones</a>
									</li>
									<li class="dropLi">
										<a href="/Proyectos/COS_2.0/modulos/reportes/listado_reportes_profesionales.php">Profesionales</a>
									</li>
								</ul>
							</div>
						</li>
					<?php } ?>

					<!-- PROFESIONAL / CLIENTE_PROFESIONAL -->

					<?php if ($idPerfil == PROFESIONAL) { ?>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/solicitud_servicio/listado_solicitudes.php?id_usuario=<?php echo $idUsuario?>">Solicitudes de Servicios</a></li>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/servicios_ofrecidos/listado_servicios_ofrecidos.php?id_usuario=<?php echo $idUsuario?>">Servicios Ofrecidos</a></li>
					<?php } ?>

					<!-- CLIENTE -->
					
					<?php if ($idPerfil == CLIENTE) { ?>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/contratar_servicio/listado_contratar_servicio.php?id_usuario=<?php echo $idUsuario?>">Contratar Servicio</a></li>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/usuario_contrataciones/listado_usuario_contrataciones.php?id_usuario=<?php echo $idUsuario?>">Mis Contrataciones</a></li>
					<?php } ?>

					<?php if ($idPerfil == CLIENTE_PROFESIONAL) { ?>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/contratar_servicio/listado_contratar_servicio.php?id_usuario=<?php echo $idUsuario?>">Contratar Servicio</a></li>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/usuario_contrataciones/listado_usuario_contrataciones.php?id_usuario=<?php echo $idUsuario?>">Mis Contrataciones</a></li>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/solicitud_servicio/listado_solicitudes.php?id_usuario=<?php echo $idUsuario?>">Solicitudes de Servicios</a></li>
						<li><a id="doubleLine" href="/Proyectos/COS_2.0/modulos/servicios_ofrecidos/listado_servicios_ofrecidos.php?id_usuario=<?php echo $idUsuario?>">Servicios Ofrecidos</a></li>
					<?php } ?>

					<!-- <li id="login"><a href="/Proyectos/COS_2.0/form_login.php">Login</a></li> -->

					<li id="cerrarSesion"><a href="/Proyectos/COS_2.0/cerrar_sesion.php" id="doubleLine">Cerrar Sesion</a></li>
				</ul> 
			</nav>
		</div>

		<br><br>

	</body>
</html>
