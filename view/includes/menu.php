<?php
    //inicio la sesion
    require_once __DIR__ . "/../../util/iniciarSesion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/menu.css">
    <title>Barra de navegacion</title>
</head>
<body>
    <div id="container-menu">
        <nav>
            <a href="" class="elemento">Mantenimiento</a>
            <a href="" class="elemento">Pedidos</a>
            <a href="" class="elemento">Suministros</a>
            <a href="./logout.php" class="elemento">Cerrar Sesion</a>
            <span id="usuario" class="elemento">
                <?php echo $_SESSION["correo"]; ?>
            </span>
        </nav>
    </div>
</body>
</html>