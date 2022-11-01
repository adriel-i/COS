<?php

require_once "../../class/Rol.php";

$id_rol = $_GET['id_rol'];

$rol = Rol::obtenerPorId($id_rol);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php">

        <h3>Modifique el rol</h3>
        <br>
        <input type="hidden" name="txtIdRol" value="<?php echo $id_rol; ?>">
        
        Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $rol->getDescripcion(); ?>">
        <br><br>

        <input type="submit" name="Guardar" value="Actualizar">

    </form>
    <footer>
        <?php require_once "../../footer.html";?>
    </footer>

</body>
</html>

