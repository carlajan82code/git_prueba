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

<body>
    <?php
    require_once("./vistas/header.php");
    ?>
    <main>
    <div class="container">
        <form method="post" action="contacto/contacto_validacion.php" onsubmit="return validar_formulario_contacto()">
            <div class="container-form">
                <div class="form-group" id="div-nombre">
                    <label for="nombre">Nombre*:</label>
                    <input type="text" id="nombre" name="nombre" minlength="2" maxlength="20" tabindex="1">
                </div>
                <div class="form-group" id="div-mail">
                    <label for="mail">Email*:</label>
                    <input type="text" id="mail" name="mail" minlength="2" maxlength="20" tabindex="3">
                </div>
                <div class="form-group" id="div-telefono">
                    <label for="telefono">Teléfono*:</label>
                    <input type="tel" id="telefono" name="telefono" minlength="6" tabindex="4">
                </div>
                <div class="form-group" id="div-direccion_1">
                    <label for="direccion1">Dirección*:</label>
                    <input type="text" id="direccion1" name="direccion1" minlength="6" maxlength="50" tabindex="5">
                </div>
                <div class="form-group" id="div-ciudad">
                    <label for="ciudad">Ciudad*:</label>
                    <input type="text" id="ciudad" name="ciudad" minlength="2" maxlength="10" tabindex="6">
                </div>
                <div class="form-group" id="div-estado">
                    <label for="estado">Estado/Provincia*:</label>
                    <input type="text" id="estado" name="estado" minlength="2" maxlength="10" tabindex="7">
                </div>
                <div class="form-group" id="div-codigoP">
                    <label for="codigo_postal">Código Postal*:</label>
                    <input type="text" id="codigoPostal" name="codigo_postal" minlength="2" maxlength="10" tabindex="8">
                </div>
                <div class="form-group" id="div-pais">
                    <label for="pais">País*:</label>
                    <select id="selectorPais" name="pais" id="pais"></select>
                </div>
                <div class="form-group" id="div-anio">
                    <label for="anio_nacimiento">Año de Nacimiento*:</label>
                    <select id="anio_nacimiento" name="anio_nacimiento"></select>
                </div>
                <div class="form-group">
                    <label for="comentarios">Cuéntanos de ti:</label>
                    <textarea id="comentarios" name="comentarios" rows="4"></textarea>
                </div>
                <div>
                    <button type="submit" name="contacto" class="boton">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    require_once("./vistas/footer.php");
    ?>
    <script src="./javaScript/validacion.js"></script>
</body>
</html>