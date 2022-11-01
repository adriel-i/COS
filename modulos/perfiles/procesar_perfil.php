<?php

require_once "../../class/Perfil.php";
require_once "../../class/PerfilModulo.php";

$descripcion = $_POST['txtDescripcion'];
$modulo = $_POST['cboModulo'];

if (trim($descripcion) == ""){
    header("location: nuevo_perfil.php?error=descripcion0");
    exit;
}

if (strLen($descripcion) < 3){
    header("location: nuevo_perfil.php?error=descripcion<3");
    exit;
}
if (empty($modulo)){
    header("location: nuevo_perfil.php?error=modulo0");
    exit;
}

$perfil  = new Perfil();
$perfil->setDescripcion($descripcion);

$perfil->guardar();

foreach($modulo as $idModulo){
    //echo $moduloId . "<br>";
    
    $perfilModulo = new PerfilModulo();
    $perfilModulo->setIdPerfil($perfil->getIdPerfil());
    $perfilModulo->setIdModulo($idModulo);
    $perfilModulo->guardar();
}

header("location: listado_perfiles.php");

?>
