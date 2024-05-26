<?php
include_once("./vistas/header.php");
?>

<div class="blog">

    <section class="blog-contenido">
        <h2>Blog del Espacio</h2>

        <article class="entrada-blog">
            <div>
                <picture>
                    <source srcset="./img/blog1.webp" type="image/webp">
                    <source srcset="./img/blog1.jpg" type="image/jpg">
                    <img class="entrada-imagen" loading="lazy" src="./img/blog1.jpg"" alt=" Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">

                <h3 class="texto-entrada--titulo">Experiencia Comiendo Sushi</h3>
                <p class="texto-entrada--p">Escrito el: <span class="texto-entrada--span"> 20/04/2024 </span> por: <span class="texto-entrada--span">admin</span> </p>

                <p class="texto-entrada--parrafo">
                    Consejos para disfrutar de un momento gastronómico único, envuelto por un mar de
                    estrellas que intensificarán tus sentidos. Ven a Disfrutar de una Experiencia inolvidable,
                    inmortal e imborrable

                </p>
                <a class="texto-entrada--boton" href="./blog/comiendo_sushi.php">Ver Publicación</a>
            </div>

        </article>

        <article class="entrada-blog">
            <div>
                <picture>
                    <source srcset="./img/blog2.webp" type="image/webp">
                    <source srcset="./img/blog2.jpg" type="image/jpg">
                    <img class="entrada-imagen" loading="lazy" src="./img/blog2.jpg"" alt=" Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">

                <h3 class="texto-entrada--titulo">Plantando Mandragoras en la Luna</h3>
                <p class="texto-entrada--p">Escrito el: <span class="texto-entrada--span"> 22/04/2024 </span> por: <span class="texto-entrada--span">Hagrid</span> </p>

                <p class="texto-entrada--parrafo">
                    Recolección de vivencias en la experiencia de plantar estos seres mágicos y únicos, en el manto lunar de la superficie,
                    con la Via Lactea de testigo. Ven a Disfrutar de una Experiencia inolvidable, inmortal e imborrable

                </p>
                <a class="texto-entrada--boton" href="./blog/mandragoras.php">Ver Publicación</a>
            </div>

        </article>

        <article class="entrada-blog">
            <div>
                <picture>
                    <source srcset="./img/blog3.webp" type="image/webp">
                    <source srcset="./img/blog3.jpg" type="image/jpg">
                    <img class="entrada-imagen" loading="lazy" src="./img/blog3.jpg"" alt=" Texto entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">

                <h3 class="texto-entrada--titulo">Caminando bajo la Luna</h3>
                <p class="texto-entrada--p">Escrito el: <span class="texto-entrada--span">&emsp;20/04/2024</span>por: <span class="texto-entrada--span">Chanchito</span> </p>

                <p class="texto-entrada--parrafo">
                    Experiencia que te volará la cabeza, disfrutar de un romántico único, ambientado en la blanca superficie de la Luna. Ven a Disfrutar de una Experiencia inolvidable,
                    inmortal e imborrable

                </p>
                <a class="texto-entrada--boton" href="./blog/caminando.php">Ver Publicación</a>
            </div>

        </article>
    </section>

</div>


<!-- <footer class="footer">

    <div class="footer_contenido--blog">
        <div class=footer_cotenido-logo>
            <img src="./img/seyfertDark.png" alt="logo Seyfert Footer" width="150px">
        </div>


    </div>

    <div class="copy_foooter--blog">
        <p>Copyright @ 2024 All rights reserved by: SEYFERT</p>
    </div>
</footer> -->

<?php
include_once("vistas/footer.php");
?>

</body>

</html>