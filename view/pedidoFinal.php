<?php
    //inicio la sesion
    require_once __DIR__ . "/../util/iniciarSesion.php";
    //compruebo la session
    require_once __DIR__ . "/../util/comprobarSesion.php";

    //Includo el controller de cesta
    require_once __DIR__ . "/../controller/CestaController.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/menu.css?v=1">
    <link rel="stylesheet" href="../public/css/pedidoFinal.css?v=1">
    <title>Pedido Realizado</title>
</head>
<body>
    <header>
        <?php include_once ("includes/menu.php"); ?>
    </header>
    <main>
        <h2>Pedido realizado con éxito</h2>

        <div class="numPed">
            <?php
                echo "Nº Pedido " . $_SESSION["numPed"];
            ?>
        </div>

        <div class="pedido">
            <h2>Detalles del Pedido</h2>

            <div class="datos-pedido">
                <?php
                    $ctrl = new CestaController();
                    $ctrl->listaPedidoFinal();
                ?>
            </div>
        </div>
    </main>
</body>
</html>