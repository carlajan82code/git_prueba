<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Document</title>
</head>

<body> -->
<?php
require_once("./vistas/header.php");

?>

<form method="post" action="./login/login_validacion.php" onsubmit="return validar_login()" class="form_login ">
    <div class="form_contenedor">
        <div class="form_input" id="email_login">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="email" name="mail" id="mail" tabindex="1" aria-label="escribe tu email aqui">
        </div>
        <div class="form_input" id="pass_login">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" placeholder="Introduzca password" name="contrasena" id="contrasena" tabindex="2">
        </div>

        <div>
            <button type="submit" name="login" class="boton_registro">Login</button>
        </div>
    </div>
</form>

<?php
require_once("./vistas/footer.php");
?>

<script src="./javaScript/validacion.js"></script>
</body>

</html>