<?php

require_once "../../class/TipoFactura.php";

$id_tipo_factura = $_GET['id_tipo_factura'];

$tipoFactura = TipoFactura::obtenerPorId($id_tipo_factura);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php">

        <h3>Modifique el tipo de factura</h3>
        <br>
        <input type="hidden" name="txtIdTipoFactura" value="<?php echo $id_tipo_factura; ?>">
        
        Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $tipoFactura->getDescripcion(); ?>">
        <br><br>

        <input type="submit" name="Guardar" value="Actualizar">


    </form>

</body>
</html>

