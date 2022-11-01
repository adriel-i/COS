<?php

require_once "../../class/Contratacion.php";
require_once "../../class/Usuario.php";
require_once "../../class/Domicilio.php";


$idContratacion = $_GET['idContratacion'];
$contratacion = Contratacion::obtenerPorId($idContratacion);
$idUsuario = $contratacion->getIdUsuario();
$cliente = Usuario::obtenerPorId($idUsuario);
$idPersona = $cliente->getIdPersona();
$listadoDomicilios = Domicilio::obtenerPorIdPersona($idPersona);

$idUsuarioServicio = $contratacion->getIdUsuarioServicio();
$usuarioServicio = UsuarioServicio::obtenerPorId($idUsuarioServicio);
$idProfesional = $usuarioServicio->getIdUsuario();
$profesional = Usuario::obtenerPorId($idProfesional);
$servicio = $usuarioServicio->servicio->getNombre();

$formatoFecha = $contratacion->getFechaHora();
$fecha = date('d-m-Y',strtotime($formatoFecha));
$hora = date("H:i:s",strtotime($formatoFecha));

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../css/styleMenu.css">
  <link rel="stylesheet" type="text/css" href="../../css/styleTicket.css">
  <script src="../../js/jquery.3.6.js"></script>
  <script src="../../js/jQuery.print.min.js"></script>
  <script>
    $(document).ready(() => {
      $('#imprimir').click(function(){
        $.print ('#imprimible');
      });
    });

  </script>


</head>
<body>
  <div class="containAll">
    <div class="ticket" id="imprimible">
      <img src="../../imagenes/Marca/Marca1.png">
      <div class="tabla">
        <table>
          <thead>
            <tr>
              <th class="head">Contratacion N°:</th>
              <td class="head"><?php echo $contratacion->getIdContratacion(); ?></td>

              <th class="head" id="fecha">Fecha:</th>
              <td class="head" id="fecha"><?php echo $fecha; ?></td>
            </tr>
            <tr>
              <th id="horah" class="head">Hora:</th>
              <td id="hora" colspan="3" class="head"><?php echo $hora?></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Cliente:</th>
              <td colspan="3"><?php echo $cliente->getNombre() ." ". $cliente->getApellido(); ?></td>
            </tr>
            <tr>
              <th>Profesional:</th>
              <td colspan="3"><?php echo $profesional->getNombre() ." ". $profesional->getApellido(); ?></td>
            </tr>
            <tr>
              <th>Servicio:</th>
              <td colspan="3"><?php echo $servicio?></td>
            </tr>
            
            <tr>
              <th>Costo:</th>
              <td colspan="3">$<?php echo $usuarioServicio->getValor(); ?></td>
            </tr>
          </tbody>
          <tfoot>
            <td style="text-align: center; padding-top: 40px; font-size: 11px;" colspan="4">COS - Contrata y Ofrece Servicios</td>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <div class="contenedor" style="text-align:center;">
     <button style="margin-top: 15px;" class="buscar" id="imprimir"class="icon-file-pdf"> Imprimir</button>
  </div>
<!-- FUNCION PRINT DE JAVASCRIP PARA IMPRIMIR EL TICKET -->
  <footer>
    <?php require_once "../../footer.html";?>
  </footer>
</body>
</html>