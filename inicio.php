<?php
// SOLO SE ENTRA AQUI SI EL LOGIN FUE CORRECTO

require_once "class/Usuario.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php require_once "menu.php"; ?>
<br><br>
Bienvenido al Inicio <?php echo $usuarioLogueado; ?>

</body>
</html>