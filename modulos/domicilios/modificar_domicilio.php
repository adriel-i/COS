<?php

require_once "../../class/Domicilio.php";
require_once "../../class/Usuario.php";


// CONTROL DE ERROR

$mensaje ="";

if (isset($_GET["error"])) {
    switch($_GET["error"]) {
        case "barrio":
            $mensaje = "VALOR INVALIDO: el barrio debe contener minimo 3 caracteres alfanumericos";
            break;
        case "calle":
            $mensaje = "VALOR INVALIDO: la calle debe contener minimo 3 caracteres alfanumericose";
            break;
        case "altura":
            $mensaje = "VALOR INVALIDO: la altura debe contener minimo 1 caracter numerico";
            break;
        case "manzana":
            $mensaje = "VALOR INVALIDO: la manzana debe contener minimo 1 caracter alfanumerico";
            break;
        case "numeroCasa":
            $mensaje = "VALOR INVALIDO: el numero de casa debe contener minimo 1 caracter numerico";
            break;
        case "torre":
            $mensaje = "VALOR INVALIDO: la torre debe contener minimo 1 caracter alfanumerico";
            break;
        case "piso":
            $mensaje = "VALOR INVALIDO: el piso debe contener minimo 1 caracter numerico";
            break;
    }
}

$id_domicilio = $_GET['id_domicilio'];
$id_persona = $_GET['id_persona'];
$domicilio = Domicilio::obtenerPorId($id_domicilio);
$persona = Persona::obtenerPorId($id_persona);
highlight_string(var_export($domicilio, true));
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../../css/styleMenu.css">
    <link rel="stylesheet" href="../../css/styleForm.css">
    <script src="../../js/usuarios/funciones.js"></script>
    
</head>
<body>
    
<?php require_once "../../menuSub.php"; ?>
    <div id="divMensaje">
        <form method="POST" action="procesar_modificacion.php?id_persona=<?php echo $persona->getIdPersona(); ?>">
            <div class="contenedor">
                <div class="form">
                    <h3>Modifique el domicilio:</h3>
                    <br><br>
                    <?php echo $mensaje ?>
                    <br>

                    <input type="hidden" name="txtIdPersona" value="<?php echo $persona->getIdPersona(); ?>">
                    <input type="hidden" name="txtIdDomicilio" value="<?php echo $id_domicilio; ?>">

                    <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varBarrio">Barrio:</label> 
                    <input type="text" name="txtBarrio" value="<?php echo $domicilio->getBarrio(); ?>" id="varBarrio" required>
                    <br><br>

                    <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varCalle">Calle:</label>
                    <input type="text" name="txtCalle" value="<?php echo $domicilio->getCalle(); ?>" id="varCalle" required>
                    <br><br>

                    <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varAltura">Altura:</label>
                    <input type="number" name="numAltura" value="<?php echo $domicilio->getAltura(); ?>" id="varAltura" required>
                    <br><br>

                    <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varManzana">Manzana:</label>
                    <input type="text" name="txtManzana" value="<?php echo $domicilio->getManzana(); ?>" id="varManzana">
                    <br><br>
                    <div class="rightDomicilio">
                        <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varNroCasa">Nro de casa:</label>
                        <input type="number" name="numNroCasa" value="<?php echo $domicilio->getNumeroCasa(); ?>" id="varNroCasa">
                        <br><br>

                        <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varTorre">Torre:</label>
                        <input type="text" name="txtTorre" value="<?php echo $domicilio->getTorre(); ?>" id="varTorre">
                        <br><br>

                        <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varPiso">Piso:</label>
                        <input type="number" name="numPiso" value="<?php echo $domicilio->getPiso(); ?>" id="varPiso">
                        <br><br>

                        <img class="rombo" src="../../imagenes/Icons/romboV.png"><label for="varObservaciones">Observaciones:</label>
                        <input type="text" name="txtObservaciones" value="<?php echo $domicilio->getObservaciones(); ?>" id="varObservaciones">
                        <br><br>

                        <button class="add" type="submit" onclick="return validarDomicilio();">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer>
        <?php require_once "../../footer.html";?>
    </footer>

</body>
</html>
