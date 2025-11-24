<?php
    //inicio la sesion
    require_once __DIR__ . "/../util/iniciarSesion.php";
    //compruebo la session
    require_once __DIR__ . "/../util/comprobarSesion.php";

    //me traigo el controlador de cesta
    require_once __DIR__ . "/../controller/CestaController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/menu.css?v=1">
    <link rel="stylesheet" href="../public/css/lineaPedido.css?v=1">
    <title>Pedido</title>
</head>
<body>
    <header>
        <?php include_once ("includes/menu.php"); ?>
    </header>
    <main>
        <div class="pedido">
            <div class="nombre">Pedido</div>
            <div class="desc">Cesta con productos</div>
        </div>
        
        <div class="header-ped">
            <div class="nombre">Nombre</div>
            <div class="desc">Descripcion</div>
            <div class="peso">Peso</div>
            <div class="stock">Unidades</div>
            <div class="unidad">Eliminar</div>
            <div class="boton"></div>
        </div>
        <form action="../index.php?controller=pedido&action=quitarUnidades" method="post">
            <div class="productos">
                <?php
                    $cesta = new CestaController();
                    $cesta->listarPedidos();
                ?>
            </div>
        </form>
    </main>
</body>
</html>