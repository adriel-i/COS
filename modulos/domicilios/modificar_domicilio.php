<?php

require_once "../../class/Domicilio.php";
require_once "../../class/Usuario.php";

$id_domicilio = $_GET['id_domicilio'];
$id_persona = $_GET['id_persona'];
$domicilio = Domicilio::obtenerPorId($id_domicilio);
$persona = Persona::obtenerPorId($id_persona);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
<?php require_once "../../menu.php"; ?>

    <form method="POST" action="procesar_modificacion.php?id_persona=<?php echo $persona->getIdPersona(); ?>">

        <h3>Modifique el domicilio</h3>
        <br>
         <input type="hidden" name="txtIdPersona" value="<?php echo $persona->getIdPersona(); ?>">
        <input type="hidden" name="txtIdDomicilio" value="<?php echo $id_domicilio; ?>">
        
        Barrio: <input type="text" name="txtBarrio" value="<?php echo $domicilio->getBarrio(); ?>">
        <br><br>

        Calle: <input type="text" name="txtCalle" value="<?php echo $domicilio->getCalle(); ?>">
        <br><br>

        Altura: <input type="number" name="numAltura" value="<?php echo $domicilio->getAltura(); ?>">
        <br><br>

        Manzana: <input type="text" name="txtManzana" value="<?php echo $domicilio->getManzana(); ?>">
        <br><br>

        Numero de casa: <input type="number" name="numNroCasa" value="<?php echo $domicilio->getNumeroCasa(); ?>">
        <br><br>

        Torre: <input type="text" name="txtTorre" value="<?php echo $domicilio->getTorre(); ?>">
        <br><br>

        Piso: <input type="number" name="numPiso" value="<?php echo $domicilio->getPiso(); ?>">
        <br><br>

        Observaciones: <input type="text" name="txtObservaciones" value="<?php echo $domicilio->getObservaciones(); ?>">
        <br><br>

        <input type="submit" name="Guardar" value="Actualizar">


    </form>

</body>
</html>
