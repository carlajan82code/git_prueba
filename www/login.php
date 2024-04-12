<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Document</title>
</head>

<body>
    <?php
        require_once("./vistas/header.php");

    ?>

    <form method="post" action="./login/login_validacion.php" class="form_login ">
        <div class="form_contenedor">
            <div class="form_input" id="nombre_registro">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="email" name="nombre" id="mail">
            </div>
            <div class="form_input" id="email_registro">
                <label for="contrasena">Contraseña</label>
                <input type="password" class="form-control" placeholder="Introduzca password" name="contrasena" id="contrasena">
            </div>

            <div>
                <button type="submit" onclick="validar_login()" name="login" class="boton_registro">Login</button>
            </div>
        </div>
    </form>

    <?php
        require_once("./vistas/footer.php");

?>

    <script src="./javaScript/validacion.js"></script>
</body>

</html>