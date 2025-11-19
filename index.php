<?php 
    //Compruebo si esta la sesion, si no esta te envia a login.php
    require_once __DIR__. "/util/comprobarSesion.php";
    require_once __DIR__ . "/controller/FerreteriaController.php";

    //si entro con post
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $controller = $_GET["controller"];
        $action = $_GET["action"];
        irControlador($controller, $action);
    }

    function irControlador ($controlador, $accion){
        $controlador = null;
        switch ($controlador){
            case "ferreteria":
                $controlador = new FerreteriaController();
                if ($accion == "login"){
                    $controlador->comprobarCredenciales($_POST["correo"], $_POST["password"]);
                }
                break;
        }
    }
?>