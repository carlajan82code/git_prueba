<?php
require_once("vistas/header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <script src="slick/slick.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="styles/galeria.css" />
    <title>Document</title>

</head>

<body>
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
    <script src='javaScript/galeria.js'></script>
</body>

<?php require_once("vistas/footer.php");
?>