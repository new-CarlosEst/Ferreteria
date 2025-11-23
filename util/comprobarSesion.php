<?php
//Este archivo php comprueba que no vaya de forma forzada a ninguna pagina, si vas sin haber iniciado sesion te envia al login otra vez

//Inicio la sesion si no lo esta
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//si no esta creado el session de login te envio a el login
if (!isset($_SESSION["login"])){
    header("Location: ../view/login.php");
    exit();
}


?>