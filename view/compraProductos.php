<?php
    //inicio la sesion
    require_once __DIR__ . "/../util/iniciarSesion.php";
    //compruebo la session
    require_once __DIR__ . "/../util/comprobarSesion.php";
    
    //me traigo el controlador de Producto
    require_once __DIR__ . "/../controller/ProductoController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/menu.css">
    <link rel="stylesheet" href="../public/css/compraProductos.css">
    <title>Compra productos</title>
</head>
<body>
    <header>
        <?php include_once ("includes/menu.php"); ?>
    </header>
    <main>
        <div class="categoria">
            <?php
            $ctrl = new ProductoController();
            echo $ctrl->pintarCategorias((int)$_SESSION["idCat"]);
            ?>
        </div>

        <form action="../index.php?controller=pedido&action=pedido" method="post">
        <div class="productos">
            
        </div>
        </form>
    </main>
</body>
</html>