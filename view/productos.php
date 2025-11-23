<?php 
    //inicio la sesion
    require_once __DIR__ . "/../util/iniciarSesion.php";
    //compruebo la session
    require_once __DIR__ . "/../util/comprobarSesion.php";
    
    //Importo el controlador de categorias
    require_once __DIR__ . "/../controller/CategoriaController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/menu.css">
    <!-- Teng que poner la ruta absoluta a la raiz del proyecto pq si no, no me coge los estilos -->
    <link rel="stylesheet" href="/ferreteria/public/css/productos.css">
    <title>Productos</title>
</head>
<body>
    <header>
        <?php include_once ("includes/menu.php"); ?>
    </header>
    <main>
        <h2>Suministros por Categoria</h2>
        <form action="../index.php?controller=producto&action=verProductos" method="post">
            <div class="suministros">
                <?php 
                $cat = new CategoriaController();
                $cat->mostrarCategorias();
                ?>
            </div>
        </form>
    </main>
</body>
</html>