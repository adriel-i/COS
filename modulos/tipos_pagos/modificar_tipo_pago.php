<?php

require_once "../../class/TipoPago.php";

$id_tipo_pago = $_GET['id_tipo_pago'];

$tipoPago = TipoPago::obtenerPorId($id_tipo_pago);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php">

        <h3>Modifique el tipo de pago</h3>
        <br>
        <input type="hidden" name="txtIdTipoPago" value="<?php echo $id_tipo_pago; ?>">
        
        Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $tipoPago->getDescripcion(); ?>">
        <br><br>
        Porcentaje: <input type="number" name="numPorcentaje" value="<?php echo $tipoPago->getPorcentaje(); ?>">

        <input type="submit" name="Guardar" value="Actualizar">


    </form>

</body>
</html>

