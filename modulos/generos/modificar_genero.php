<?php

require_once "../../class/Genero.php";

$id_genero = $_GET['id_genero'];

$genero = Genero::obtenerPorId($id_genero);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php">

        <h3>Modifique el genero</h3>
        <br>
        <input type="hidden" name="txtIdGenero" value="<?php echo $id_genero; ?>">
        
        Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $genero->getDescripcion(); ?>">
        <br><br>

        <input type="submit" name="Guardar" value="Actualizar">
    </form>
    <footer>
        <?php require_once "../../footer.html";?>
    </footer>

</body>
</html>

