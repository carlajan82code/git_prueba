<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <script src="slick/slick.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/galeria.css" />

</head>

<body class="body-galeria">
    <?php require_once("vistas/header.php"); ?>
    <main>
    <section class="centrar">
        <div class="contenedorSlider">
            <div id="slider">
                <div><img class="imagen" src="img/slide1.jpg"></div>
                <div><img class="imagen" src="img/slide2.jpg"></div>
                <div><img class="imagen" src="img/slide3.jpg"></div>
                <div><img class="imagen" src="img/slide4.jpg"></div>
            </div>
        </div>
    </section>
    </main>
<?php require_once("vistas/footer.php");?>
<script src='javaScript/galeria.js'></script>
</body>
</html>
