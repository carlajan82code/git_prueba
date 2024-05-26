<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Comiendo Sushi</title>
</head>

<body>
<header>
		<nav class="navegacion">
			<div class="navegacion_contenido">
				<a href="../index.php"><img src="../img/Seyfert.png" alt="logo Seyfert" width="150px"></a>

				<div class="enlaces-nav">
					<a class="navegacion_contenido--enlace" href="../registro.php">Registrarse</a>
					<a class="navegacion_contenido--enlace" href="../login.php">Log-in</a>
					<a class="navegacion_contenido--enlace" href="../galeria.php">Galeria</a>

				</div>
				<!-- <a class="nav-link" href="../index.php?log-out">Log-out</a> -->

				<div class="enlaces-nav__boton">
					<a class="navegacion_contenido--enlace" href="../contacto.php">Contacto</a>
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ufo" width="42" height="42" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none" />
						<path d="M16.95 9.01c3.02 .739 5.05 2.123 5.05 3.714c0 2.367 -4.48 4.276 -10 4.276s-10 -1.909 -10 -4.276c0 -1.59 2.04 -2.985 5.07 -3.724" />
						<path d="M7 9c0 1.105 2.239 2 5 2s5 -.895 5 -2v-.035c0 -2.742 -2.239 -4.965 -5 -4.965s-5 2.223 -5 4.965v.035" />
						<path d="M15 17l2 3" />
						<path d="M8.5 17l-1.5 3" />
						<path d="M12 14h.01" />
						<path d="M7 13h.01" />
						<path d="M17 13h.01" />
					</svg>

					<a class="navegacion_contenido--boton" href="../blog.php">blog</a>

				</div>

			</div>
		</nav>
	</header>


<main>

<h1 class="cabecera_entrada_blog">Comer sushi en la Luna</h1>
<h2 class="subtitulo_blog">Una experiencia gastronómica fuera de este mundo: Comer sushi en la Luna</h2>

    <picture class="bloque_imgEntrada">
        <source srcset="../img/blog1.webp" type="image/webp">
        <source srcset="../img/blog1.jpg" type="image/jpg">
        <img class="entrada-imagen_blog" loading="lazy" src="../img/blog1.jpg"" alt=" Texto entrada Blog">
    </picture>
<div class="texto_entrada_blog">
<p class="parrafo_entrada_blog">
Imagina flotar en la vastedad del espacio, con la Tierra como una esfera azul brillante en el horizonte lunar,
 mientras sostienes delicadamente un trozo de sushi entre tus dedos. Esta no es una escena de ciencia ficción,
  sino una posibilidad real en el futuro cercano. La exploración espacial ha avanzado tanto que incluso la 
  comida, uno de los placeres más terrenales, ha encontrado su camino hasta la Luna.</p>
<p class="parrafo_entrada_blog">
El sushi, con su mezcla única de sabores y texturas, ha sido adaptado para la vida en el espacio, convirtiéndose en una opción popular entre los astronautas. Pero, ¿cómo es la experiencia de comer sushi en la Luna?
Para empezar, la ingravidez añade un giro intrigante a esta experiencia culinaria, con estrellas parpadeantes y la superficie lunar extendiéndose hasta donde alcanza la vista. Es una experiencia que te conecta con la inmensidad del universo de una manera única.

</p>
</div>
</main>
<?php
include_once("../vistas/footer.php");
?>
</body>
</html>


















