<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css" >
    <title>Document</title>
</head>
<body>
    <?php
        require_once("./vistas/header.php");

    ?>
<form method="post" action="registro_validacion.php" class="form_registro">
    <div class="form_contenedor">
    <div class="form_input" id="nombre_registro">
        <label for="nombre">Nombre de usuario</label>
        <input type="text" class="form-control" placeholder="Indica el nombre de usuario" name="nombre" id="nombre" minlength="2" maxlength="20">
    </div>
    <div class="form_input" id="email_registro">
        <label for="mail">Correo Electronico</label>
        <input type="email" class="form-control" placeholder="Introduzca email" name="mail" id="mail">
    </div>
<div class="form_input" id="contrasena_registro">
    <label for="contrasena">Contraseña</label>
    <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" id="contrasena" minlength="6" maxlength="8">
</div>
<div class="form_input">
    <label for="conf_contrasena">Confirmar Contraseña</label>
    <input type="password" class="form-control" name="conf_contrasena" placeholder="Confirme Contraseña..." id="conf_contrasena" minlength="6" maxlength="8">
</div>
<div>

    <button type="submit" onclick="validar_registro()" name="registro" class="boton_registro">Registrarse</button>
</div>
<div class="boton_separacion">
    <p>¿Ya tienes una cuenta?</p>
    <a href="login.php">Ingresar ahora</a>
</div>
</div>

</form>


<?php
        require_once("./vistas/footer.php");

?>

<script src="./javaScript/validacion.js"></script>
</body>
</html>




