<?php
	require_once "../../menuSub.php";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../../css/styleMenu.css">
	<link rel="stylesheet" href="../../css/styleTabla.css">
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<style type="text/css">

		ul.links li a {
			text-decoration: none;
			color: black;
			padding: 16px 32px;
			display: block;
		}
		ul.links li a:hover {
			color: white;
		}
		
		ul.links li {
			width: 300px;
			background-color: #eeadb8; 
		    color: black; 
		    display: block;
		    border: 2px solid #b0606d;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin: 4px 2px;
		    -webkit-transition-duration: 0.4s; /* Safari */
		    transition-duration: 0.4s;
		    cursor: pointer;
		    list-style: none;
		    
		}

		ul.links li:hover {
		    background-color: #b0606d;
		}

		div.links {
			width: 500px;
		    display: inline-block;
		    border: 3px solid;
		    border-color: #47b39c;
		    /*padding: 5% 10% 5% 7%;*/
		    align-content: center;
		}

		ul.links {
			margin: 5% 10% 5% 10%;
		}

	</style>
</head>
<body>

	<div class="containAll">
		<div class="links">
			<h3>Reportes de contrataciones</h3>
			<ul class="links">
				<li>
					<a href="contrataciones_por_servicio.php">Reportes por servicio</a>
				</li>
				<li>
					<a href="contrataciones_por_fecha.php">Reportes por fecha</a>
				</li>
				<li>
					<a href="contrataciones_por_servicio_y_fecha.php">Reportes por servicio y fecha</a>
				</li>
			</ul>
		</div>
	</div>
	
	<footer>
		<?php require_once "../../footer.html";?>
	</footer>

</body>
</html>
