<?php
// SOLO SE ENTRA AQUI SI EL LOGIN FUE CORRECTO
require_once "class/Usuario.php";
require_once "class/UsuarioServicio.php";
require_once "class/Genero.php";
require_once "menu.php";
//TO DO:
// anadir combos anidados en nueva_contratacion
// arreglar modulo "servicios_ofrecidos"
// anadir modulo de contrataciones pendientes
// $idPerfil= $usuarioLogueado->getIdPerfil();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styleDashboard.css">
	<link rel="stylesheet" type="text/css" href="css/styleTabla.css">
	<script type="text/javascript" src="js/jquery3.6.js"></script>
	<script type="text/javascript" src="js/chart.min.js"></script>
	<!-- <script src="https://kit.fontawesome.com/ee56d90c29.js" crossorigin="anonymous"></script> -->
	
	<title></title>
</head>
<body>

	<!-- <?php //require_once "menu.php"; ?> -->
	

	<h3>Bienvenido al Inicio <?php echo $usuarioLogueado; ?></h3>
	<div class="contenedorDashboard">
		<?php if ($idPerfil == ADMINISTRADOR) { ?>
		
			<div class="rectanguloIzquierda">
				<h3 style="font-size: 13px;">Servicios mas ofrecidos</h3>
				<canvas id="serviciosOfrecidos" height="95"></canvas>
			</div>

			<div class="cuadroDerecha">
				<h3 style="font-size: 13px;">Porcentaje de Generos  de usuarios</h3>
				<canvas id="generosUsuarios" style="max-height: 240px;"></canvas>
			</div>

			<div class="servicios">
				<h3 style="font-size: 13px;">Servicios mas requeridos</h3>
				<canvas id="serviciosRequeridos" height="95"></canvas>
			</div>

			<div class="cuadroIzquierda">
				<h3 style="font-size: 13px;">Porcentaje de profesionales contratados</h3>
				<canvas id="profesionalesContratados" style="max-height: 240px;"></canvas>
			</div>

			<?php 
				// SERVICIOS MAS OFRECIDOS
		        $ofrecidos = UsuarioServicio::obtenerMasOfrecidos();
		        // SERVICIOS MAS REQUERIDOS
		        $requeridos = UsuarioServicio::obtenerMasRequeridos();
		        // PORCENTAJE DE GENEROS
		        $generos = Genero::obtenerGeneros();

		        foreach ($generos as $genero) {
		        	       
		        	if ($genero['descripcion'] == 'Masculino') {
		        		$cantidadMasculinos = $genero['cantidad_genero'];
		        	}
		        	if ($genero['descripcion'] == 'Femenino') {
		        		$cantidadFemeninos = $genero['cantidad_genero'];
		        	}
		        	if ($genero['descripcion'] == 'No Binario') {
		        		$cantidadNoBinarios = $genero['cantidad_genero'];
		        	}
		        	if ($genero['descripcion'] == 'No Definido') {
		        		$cantidadNoDefinidos = $genero['cantidad_genero'];
		        	}
		        	if ($genero['descripcion'] == 'Otro') {
		        		$cantidadOtros = $genero['cantidad_genero'];
		        	}

		    	}
		   		
		    	$total = $cantidadMasculinos + $cantidadFemeninos + $cantidadNoBinarios + $cantidadNoDefinidos +$cantidadOtros;

		   		$porcentajeMasculinos = ($cantidadMasculinos * 100) / $total;
		   		$porcentajeFemeninos = ($cantidadFemeninos * 100) / $total;
		   		$porcentajeNoBinarios = ($cantidadNoBinarios * 100) / $total;
		   		$porcentajeNoDefinidos = ($cantidadNoDefinidos * 100) / $total;
		   		$porcentajeOtros = ($cantidadOtros * 100) / $total;

		   		// PORCENTAJE DE PROFESIONALES CONTRATADOS

		   		$cantidadContratados = UsuarioServicio::obtenerCantidadProfesionalesContratados();
		   		$cantidadProfesionales = UsuarioServicio::obtenerCantidadProfesionales();
		   		foreach ($cantidadContratados as $contratados) {
		   			$totalContratados = $contratados['cantidad_contratados'];
		   		}
		   		foreach ($cantidadProfesionales as $profesionales) {
		   			$totalProfesionales = $profesionales['cantidad_profesionales'];
		   		}

		   		$porcentajeContratados = ($totalContratados * 100) / $totalProfesionales;
		   		$porcentajeNoContratados = ($totalProfesionales - $totalContratados) * 100 / $totalProfesionales;
			?>
		<!-- CIERRE DE IF -->
	<?php } else{
		echo('<img src="imagenes/Marca/Marca.png" style="width: 45%; margin-left: 450px">');
	} ?>

	</div>
	<footer>
		<?php require_once "footer.html"?>
	</footer>
	
</body>
	<script defer>
		const ctx = document.getElementById('serviciosOfrecidos').getContext('2d');
		const serviciosOfrecidos = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: [<?php foreach ($ofrecidos as $servicio) {
		        	echo "\"{$servicio['nombre']}\"".", ";
		        }?>],
		        datasets: [{
		            label: 'PROFESIONALES QUE OFRECEN',
		            data: [<?php foreach ($ofrecidos as $cantidad) {
		        	echo "{$cantidad['cantidad_ofrecida']}".", ";
		        }?>],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.5)',
		                'rgba(54, 162, 235, 0.5)',
		                'rgba(255, 206, 86, 0.5)',
		                'rgba(75, 192, 192, 0.5)',
		                'rgba(153, 102, 255, 0.5)',
		                'rgba(255, 159, 64, 0.5)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            y: {
		                beginAtZero: true
		            }
		        }
		    }
		});


		const ctt = document.getElementById('serviciosRequeridos').getContext('2d');
		const serviciosRequeridos = new Chart(ctt, {
		    type: 'bar',
		    data: {
		        labels: [<?php foreach ($requeridos as $servicioRequerido) {
		        	echo "\"{$servicioRequerido['nombre']}\"".", ";
		        }?>],
		        datasets: [{
		            label: 'CANTIDAD DE CONTRATACIONES',
		            data: [<?php foreach ($requeridos as $cantidadRequerida) {
		        	echo "{$cantidadRequerida['cantidad_requerida']}".", ";
		        }?>],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.5)',
		                'rgba(54, 162, 235, 0.5)',
		                'rgba(255, 206, 86, 0.5)',
		                'rgba(75, 192, 192, 0.5)',
		                'rgba(153, 102, 255, 0.5)',
		                'rgba(255, 159, 64, 0.5)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            y: {
		                beginAtZero: true
		            }
		        }
		    }
		});

		const cxx = document.getElementById('generosUsuarios').getContext('2d');
		const generosUsuarios = new Chart(cxx, {
		    type: 'doughnut',
		    data: {
		        labels: [<?php foreach ($generos as $generoDescripcion) {
		        	echo "\"{$generoDescripcion['descripcion']}\"".", ";
		        }?>],
		        datasets: [{
		            label: 'PORCENTAJE DE GENEROS',
		            data: [<?php
		        	echo "{$porcentajeMasculinos}".", "."{$porcentajeFemeninos}".", "."{$porcentajeNoBinarios}".", "."{$porcentajeNoDefinidos}".
		        	", "."{$porcentajeOtros}";
		        ?>],
		            backgroundColor: [
		                'rgb(255, 99, 132)',
		                'rgb(54, 162, 235)',
		                'rgb(255, 206, 86)',
		                'rgb(75, 192, 192)',
		                'rgb(153, 102, 255)',
		                'rgb(255, 159, 64)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {

		    }
		});


		const cyy = document.getElementById('profesionalesContratados').getContext('2d');
		const profesionalesContratados = new Chart(cyy, {
		    type: 'doughnut',
		    data: {
		        labels: ["Contratados", "No Contratados"],
		        datasets: [{
		            label: 'PORCENTAJE DE GENEROS',
		            data: [<?php
		        	echo "{$porcentajeContratados}".", "."{$porcentajeNoContratados}";
		       	 	?>],
		            backgroundColor: [
		                'rgb(255, 99, 132)',
		                'rgb(54, 162, 235)',
		                'rgb(255, 206, 86)',
		                'rgb(75, 192, 192)',
		                'rgb(153, 102, 255)',
		                'rgb(255, 159, 64)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {

		    }
		});

	</script>
</html>

