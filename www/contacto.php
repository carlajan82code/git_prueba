<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./javaScript/contacto.js"></script>
</head>

<body id="container-contacto">
    <?php
    require_once("./vistas/header.php");
    ?>
    <header>
        <div class="header-container">
            <div class="cuentanos">
                <h1>Cuéntanos de ti</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <h2>Formulario de Contacto</h2>
        <form action="contacto/contacto_validacion.php" method="post">
            <div class="form-group" id="div-nombre">
                <label for="nombre">Primer Nombre:</label>
                <input type="text" id="nombre" name="nombre" minlength="2" maxlength="20" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" minlength="2" maxlength="20" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" minlength="2" maxlength="20" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="telefono">Número de Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" minlength="6" tabindex="4" required>
            </div>
            <div class="form-group">
                <label for="direccion1">Dirección 1:</label>
                <input type="text" id="direccion1" name="direccion1" minlength="6" maxlength="50" tabindex="5" required>
            </div>
            <div class="form-group">
                <label for="direccion2">Dirección 2:</label>
                <input type="text" id="direccion2" name="direccion2" minlength="6" maxlength="50" tabindex="6">
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" minlength="2" maxlength="10" tabindex="7" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado/Provincia:</label>
                <input type="text" id="estado" name="estado" minlength="2" maxlength="10" tabindex="8" required>
            </div>
            <div class="form-group">
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="codigo_postal" minlength="2" maxlength="10" tabindex="9" required>
            </div>
            <div class="form-group">
                <label for="pais">País:</label>
                <select id="selectorPais" name="pais" required></select>
            </div>
            <div class="form-group">
                <label for="anio_nacimiento">Año de Nacimiento:</label>
                <select id="anio_nacimiento" name="anio_nacimiento" required></select>
            </div>
            <div class="form-group">
                <label for="comentarios">Cuéntanos de ti:</label>
                <textarea id="comentarios" name="comentarios" rows="4"></textarea>
            </div>
            <div>
                <button type="submit" onclick="validar_formulario_contacto()" name="contacto" class="boton">Enviar</button>
            </div>

        </form>
    </div>

    <?php
    require_once("./vistas/footer.php");
    ?>
    <script src="./javaScript/validacion.js"></script>
</body>

</html>