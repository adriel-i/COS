<?php

// EMPEZAMOS LA SESION
session_start();
// DESTRUIMOS LA SESION
session_destroy();
//  REDIRECCIONA AL LOGIN
header("location: form_login.php");


?>