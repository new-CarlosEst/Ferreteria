<?php
     //inicio la sesion
    require_once __DIR__ . "/../util/iniciarSesion.php";
    //compruebo la session
    require_once __DIR__ . "/../util/comprobarSesion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/menu.css?v=1">
    <link rel="stylesheet" href="../public/css/mantenimiento.css?v=1">
    <title>Mantenimiento</title>
</head>
<body>
    <header>
        <?php include_once ("includes/menu.php"); ?>
    </header>
    <main>
        <h2>Modulo de Mantenimiento</h2>

        <div class="container">
            <div class="form">
                <button id="categorias" class="mantenimiento">1.-Categorias</button>
                <button id="productos" class="mantenimiento">2.-Productos</button>
            </div>
        </div>
    </main>

    <script src="../public/js/mantenimiento.js"></script>
</body>
</html>