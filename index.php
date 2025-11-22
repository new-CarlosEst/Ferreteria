<?php
    //Si no es un intento de login
    if (!isset($_GET['action']) || $_GET['action'] !== 'login') {
        require_once __DIR__ . "/util/comprobarSesion.php";
    }

    //Importo todos los controladores
    require_once __DIR__ . "/controller/FerreteriaController.php";

    //si entro con post
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION["login"] = true;
        $controller = $_GET["controller"];
        $action = $_GET["action"];
        irControlador($controller, $action);
    }

    function irControlador ($controlador, $accion){
    switch ($controlador){
        case "ferreteria":
            $ctrl = new FerreteriaController();
            if ($accion == "login"){
                $redirigir = $ctrl->login($_POST["correo"], $_POST["password"]);
                if ($redirigir){
                    echo '<script>
                        window.location.href = "view/productos.php";
                    </script>';
                } else {
                    //me envio con window.location pa no funcion el header si hay cosas antes
                    echo '<script>
                        alert("Correo o contraseña no válidos");
                        window.location.href = "view/login.php";
                    </script>';
                }
            }
            break;
    }
}
?>

