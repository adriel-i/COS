<?php
// ../ ES PARA SALIR DEL DIRECTORIO
require_once "../../class/UsuarioServicio.php";
require_once "../../menuSub.php";
$idUsuario = $_GET['id_usuario'];
$lista = UsuarioServicio::obtenerPorIdUsuario($idUsuario);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="../../css/jquery.modal.min.css">
	<script type="text/javascript" defer>
		//recibir por paramettro id de servicio del input
		function habilitarInput($idUsuarioServicio){
			var input = document.getElementById($idUsuarioServicio);
			input.disabled= false;
			input.style.backgroundColor= "#47b39c";
			input.style.color= "white";
		}

		function mostrarBoton($idServicio){
			var boton = document.getElementById($idServicio);
			boton.style.display= "block";
		}
	</script>
</head>
<body>

	<!-- <h3><a href="agregar_servicio_ofrecido.php?id_usuario=<?php // echo $idUsuario;?>">AGREGAR SERVICIO</a></h3> -->
	<div class="containAll">
		<div class="tabla">
			
			<h3>Servicios Ofrecidos:</h3>
			<table>
				<a class="mas" href="agregar_servicio_ofrecido.php?id_usuario=<?php echo $idUsuario;?>" ><img class="mas" src="../../imagenes/svg/mas.svg"></a>
				<thead>
					<tr>
						<th>Servicio</th>
						<th>Valor</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach  ($lista as $usuarioServicio): 
						$idUsuarioServicio = $usuarioServicio->getIdUsuarioServicio();
						$idServicio = $usuarioServicio->servicio->getIdServicio();
						// echo($idServicio);
						?>
						<tr>
							<form method="POST" action="procesar_modificacion.php?id_usuario_servicio=<?php echo $idUsuarioServicio ;?>&id_usuario=<?php echo $idUsuario;?>">
							
								<td><?php echo $usuarioServicio->servicio->getNombre(); ?></td>
								<td><label for="<?php echo ($idUsuarioServicio); ?>">$</label>
									<input onclick="mostrarBoton(<?php echo $idServicio; ?>)" class="numValor" disabled type="number" name="numValor"
									id="<?php echo ($idUsuarioServicio); ?>"  
									value="<?php echo $usuarioServicio->getValor(); ?>">
									
									<button type="submit" class="botonGuardar" id="<?php echo ($idServicio); ?>">
									Guardar</button>
								</td>
							</form>
							<td>
								<a class="accion1" onclick="habilitarInput(<?php echo $idUsuarioServicio; ?>)">Modificar</a>
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
	  <a class="boton" id="aceptar" href="procesar_baja.php?id_usuario_servicio=
	  <?php echo $usuarioServicio->getIdUsuarioServicio(); ?>&id_usuario=<?php echo $idUsuario; ?>">Aceptar</a>
	</div>

	<footer>
		<?php require_once "../../footer.html";?>
	</footer>
</body>
</html>

