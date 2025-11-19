<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/login.css">
    <!-- Le coloco las fuentes desde google api -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div id="container-form">
        <h1>Iniciar Sesión</h1>
        
        <form action="">
            <label for="correo">Correo</label>
            <div class="input">
                <img src="../public/resources/icons/IconoirUser.png" alt="iconoUsuario">
                <input type="text">
            </div>

            <label for="contra">Contraseña</label>
            <div class="input">
                <img src="../public/resources/icons/IconoirLock.png" alt="iconContra">
                <input type="password" id = "contra">
                <img src="../public/resources/icons/OpenEye.png" alt="ojo" id="verContra">
            </div>

            <div class="boton">
                <button>Iniciar Sesion</button>
            </div>
        </form>
    </div>

    <script src="../public/js/login.js"></script>
</body>
</html>