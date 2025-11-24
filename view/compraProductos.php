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
            echo $ctrl->datosCategoria((int)$_SESSION["idCat"]);
            ?>
        </div>
        
        <div class="header-prod">
            <div class="nombre">Nombre</div>
            <div class="desc">Descripcion</div>
            <div class="peso">Peso</div>
            <div class="stock">Stock</div>
            <div class="unidad">Comprar</div>
            <div class="boton"></div>
        </div>
        <form action="../index.php?controller=pedido&action=addPedido" method="post">
            <div class="productos">
                <?php
                    echo $ctrl->mostrarProductos((int)$_SESSION["idCat"]);
                ?>
            </div>
        </form>
    </main>
</body>
</html>