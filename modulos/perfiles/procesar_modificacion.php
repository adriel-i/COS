<?php

require_once "../../class/PerfilModulo.php";
require_once "../../class/Perfil.php";

//OBTENEMOS DATOS DEL FORMULARIO
$idPerfil = $_POST["txtIdPerfil"];
$descripcion = $_POST['txtDescripcion'];
$modulo = $_POST['cboModulo'];

//VALIDACIONES
if (trim($descripcion) == ""){
    header("location: modificar_perfil.php?error=descripcion0&id_perfil=".$idPerfil);
    exit;
}

if (strLen($descripcion) < 3){
    header("location: modificar_perfil.php?error=descripcion<3&id_perfil=".$idPerfil);
    exit;
}
if (empty($modulo)){
    header("location: modificar_perfil.php?error=modulo0&id_perfil=".$idPerfil);
    exit;
}

//ACTUALIZAR DESCRIPCION DEL PERFIL
$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->setDescripcion($descripcion);
$perfil->actualizar();

//ELIMINAMOS DATOS DE LA CLASE
$perfilModulo = PerfilModulo::obtenerPorIdPerfil($idPerfil);
// echo($perfilModulo);
// exit;
$perfilModulo->darBaja($idPerfil);


//REVARGAMOS DATOS
foreach($modulo as $idModulo){

    $perfilModulo = new PerfilModulo();
    $perfilModulo->setIdPerfil($idPerfil);
    $perfilModulo->setIdModulo($idModulo);
    $perfilModulo->guardar();

}

header("location: listado_perfiles.php");

?>
