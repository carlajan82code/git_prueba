<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css" >
    <title>Document</title>
</head>
<body>
<?php
        require_once("./vistas/header.php");

    ?>

<form method="post" action="./login_validacion.php" class="form_login ">
    <div class="form_contenedor">
        <div class="form_input" id="nombre_registro">
            <label for="nombre">Email</label>
            <input type="text" class="form-control" placeholder="" name="nombre" id="nombre">
        </div>
        <div class="form_input" id="email_registro">
            <label for="mail">Contraseña</label>
            <input type="email" class="form-control" placeholder="Introduzca email" name="mail" id="mail">
        </div>

        <div>
            <button type="submit" onclick="validar_registro()" name="login" class="boton_registro">Login</button>
        </div>
    </div>
</form>

<?php
        require_once("./vistas/footer.php");

?>


</body>
</html>