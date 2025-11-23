<?php
    //Si llamo a la raiz (o a index.php me envia a login)
    session_start();

    // Si no existe sesión, y no hay un form post me envia a login
    if (!isset($_SESSION["usuario"]) && $_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: view/login.php");
        exit();
    }

    //Importo todos los controladores
    require_once __DIR__ . "/controller/FerreteriaController.php";

    //si entro con post
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
                    $_SESSION["login"] = true;
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

