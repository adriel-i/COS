<?php

require_once "../../class/TipoImpuesto.php";

$id_tipo_impuesto = $_GET['id_tipo_impuesto'];

$tipoImpuesto = TipoImpuesto::obtenerPorId($id_tipo_impuesto);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php">

        <h3>Modifique el tipo de impuesto</h3>
        <br>
        <input type="hidden" name="txtIdTipoImpuesto" value="<?php echo $id_tipo_impuesto; ?>">
        
        Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $tipoImpuesto->getDescripcion(); ?>">
        <br><br>
        Porcentaje: <input type="number" name="numPorcentaje" value="<?php echo $tipoImpuesto->getPorcentaje(); ?>">

        <input type="submit" name="Guardar" value="Actualizar">


    </form>

</body>
</html>

