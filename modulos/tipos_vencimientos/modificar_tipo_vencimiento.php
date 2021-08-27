<?php

require_once "../../class/TipoVencimiento.php";

$id_tipo_vencimiento = $_GET['id_tipo_vencimiento'];

$tipoVencimiento = TipoVencimiento::obtenerPorId($id_tipo_vencimiento);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php">

        <h3>Modifique el tipo de vencimiento</h3>
        <br>
        <input type="hidden" name="txtIdTipoVencimiento" value="<?php echo $id_tipo_vencimiento; ?>">
        
        Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $tipoVencimiento->getDescripcion(); ?>">
        <br><br>
        Porcentaje: <input type="number" name="numPorcentaje" value="<?php echo $tipoVencimiento->getPorcentaje(); ?>">

        <input type="submit" name="Guardar" value="Actualizar">


    </form>

</body>
</html>

