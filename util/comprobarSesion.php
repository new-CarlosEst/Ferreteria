<?php
//Este archivo php comprueba que no vaya de forma forzada a ninguna pagina, si vas sin haber iniciado sesion te envia al login otra vez

//Inicio la sesion si no lo esta
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Si no hay la sesion te envia a login.php
if (!isset($_SESSION['sesion'])) {
    header("Location: view/login.php");
    exit();
}
?>