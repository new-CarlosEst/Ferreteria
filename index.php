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
    require_once __DIR__ . "/controller/CestaController.php";

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
            if ($accion === "login"){
                $redirigir = $ctrl->login($_POST["correo"], $_POST["password"]);
                if ($redirigir){
                    $_SESSION["login"] = true;
                    echo '<script>
                        window.location.href = "view/landing.php";
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

        case "producto":
            if ($accion === "verProductos"){
                //Me meto el id de la categoria en una sesion
                $_SESSION["idCat"] = $_POST["categoria"];
                //Me envio a compraProductos
                echo '<script>
                    window.location.href="view/compraProductos.php";
                </script>';
            }
            break;
        
        case "pedido":
            $ctrl = new CestaController();
            if ($accion === "addPedido"){
                //Saco el id del producto del boton y saco el que coincida con el de las unidades el id
                $idProducto = (int)$_POST["producto"];
                $unidades = isset($_POST["unidades"][$idProducto]) ? (int)$_POST["unidades"][$idProducto] : 0;
                
                if ($unidades <= 0){
                    echo '<script>
                        window.alert("No puedes introducir 0 o menos unidades");
                        window.location.href="view/compraProductos.php";
                    </script>';
                }
                else {
                    $ctrl->hacerPedido($idProducto, $unidades, $_SESSION["correo"]);
                    echo '<script>
                        window.location.href="view/lineaPedido.php";
                    </script>';
                }
            }

            else if ($accion === "quitarUnidades"){
                $idProducto = (int)$_POST["producto"];
                $unidades = isset($_POST["unidades"][$idProducto]) ? (int)$_POST["unidades"][$idProducto] : 0;

                if ($unidades <= 0){
                    echo '<script>
                        window.alert("No puedes introducir 0 o menos unidades a eliminar");
                        window.location.href="view/lineaPedido.php";
                    </script>';
                }
                else {
                    $ctrl->eliminarUnidades($idProducto, $unidades);
                    echo '<script>
                        window.location.href="view/lineaPedido.php";
                    </script>';
                }
            }
            else if ($accion === "validar"){
                
            }
            break;
    }
}
?>

