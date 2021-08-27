<?php

require_once "../../class/TipoContacto.php";

$id_tipo_contacto = $_GET['id_tipo_contacto'];

$tipoContacto = TipoContacto::obtenerPorId($id_tipo_contacto);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php">

        <h3>Modifique el tipo de contacto</h3>
        <br>
        <input type="hidden" name="txtIdTipoContacto" value="<?php echo $id_tipo_contacto; ?>">
        
        Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $tipoContacto->getDescripcion(); ?>">
        <br><br>

        <input type="submit" name="Guardar" value="Actualizar">


    </form>

</body>
</html>

